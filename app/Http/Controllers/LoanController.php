<?php

namespace App\Http\Controllers;

use App\Mail\ReturnNotification;
use App\Mail\LoanNotification;

use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

use App\Models\Collaborator;
use App\Models\LoanStatus;
use App\Models\Loan;
use App\Models\Copy;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::all();

        return view('loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $loans = Loan::all();
        $copies = Copy::where('copy_status_id', 1)->get();
        $collaborators = Collaborator::all();
        $loanStatuses = LoanStatus::all();

        return view('loans.create', compact('loans', 'copies', 'collaborators', 'loanStatuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'copy_id' => 'required|exists:copies,id',
            'collaborator_id' => 'required|exists:collaborators,id',
            'loan_date' => 'required|date',
            'expected_return_date' => 'required|date',
            'loan_status_id' => 'required|exists:loan_statuses,id',
            'fine' => 'nullable|numeric'
        ]);

        // Obtem o tipo de colaborador com base no colaborator_id
        $collaborator = Collaborator::findOrFail($validatedData['collaborator_id']);
        $collaboratorType = $collaborator->collaborator_type_id;
        
        // Verifica o tipo de colaborador e seu limite de empréstimo
        $loanLimit = 2; // Limite padrão
        if ($collaboratorType && $collaboratorType === 4) {
            $loanLimit = 4; // Limite para advogados
        }

        // Verifica se o colaborador já atingiu o limite de empréstimos ativos
        $activeLoansCount = Loan::where([
            ['collaborator_id', $validatedData['collaborator_id']],
            ['loan_status_id', 1]
        ])
        ->whereNull('actual_return_date')
        ->count();

        // Retorna erro caso tenha atingido o limite
        if ($activeLoansCount >= $loanLimit) {
            return back()->with('error', 'O colaborador atingiu o limite de empréstimos ao mesmo tempo (' . $loanLimit . ').' );
        }

        // Calcula a data de devolução ajustada
        $dueDate = $this->calculateDueDate($validatedData['expected_return_date']);

        // Verifica se a data de devolução excede o limite de 7 dias para advogados
        if ($collaboratorType && $collaboratorType === 4) {
            $loanStartDate = Date::parse($validatedData['loan_date']);
            $loanDueDate = Date::parse($dueDate);

            $daysDifference = $loanStartDate->diffInDays($loanDueDate);

            if ($daysDifference > 7) {
                return back()->with('error', 'O prazo de empréstimo para advogados não pode exceder 7 dias.');
            }
        }

        // Cria o empréstimo com a data de devolução ajustada
        $validatedData['expected_return_date'] = $dueDate;
        $loan = Loan::create($validatedData);
    
        // Atualiza o status da cópia para "Emprestado" 
        $copy = Copy::findOrFail($validatedData['copy_id']);
        $copy->update(['copy_status_id' => 2]);

        $collaborator = Collaborator::findOrFail($validatedData['collaborator_id']);
        Mail::to($collaborator->email)->send(new LoanNotification($loan, $collaborator));
    
        return redirect()->route('loans.show', $loan);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $loan = Loan::findOrFail($id);

        return view('loans.show', compact('loan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $loan = Loan::findOrFail($id);
        $loan->loan_date = Carbon::parse($loan->loan_date)->format('Y-m-d');
        $loan->expected_return_date = Carbon::parse($loan->expected_return_date)->format('Y-m-d');
        $loan->actual_return_date = $loan->actual_return_date ? Carbon::parse($loan->actual_return_date)->format('Y-m-d') : null;

        $copies = Copy::all();
        $collaborators = Collaborator::all();
        $loanStatuses = LoanStatus::all();

        return view('loans.edit', compact('loan', 'copies', 'collaborators', 'loanStatuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $loan = Loan::findOrFail($id);
        $validatedData = $request->validate([
            'copy_id' => 'required|exists:copies,id',
            'collaborator_id' => 'required|exists:collaborators,id',
            'loan_date' => 'required|date',
            'expected_return_date' => 'required|date',
            'actual_return_date' => 'nullable|date',
            'loan_status_id' => 'required|exists:loan_statuses,id',
            'fine' => 'nullable|numeric'
        ]);

        // Verifica se a "Data de Devolução Efetiva" foi definida
        if ($request->has('actual_return_date')) {
            // Atualiza o status da cópia para "Disponível"
            $copy = Copy::findOrFail($validatedData['copy_id']);
            $copy->update(['copy_status_id' => 1]);
        }

        // Calcula a data de devolução ajustada, se a data original for alterada
        if (isset($validatedData['expected_return_date'])) {
            $dueDate = $this->calculateDueDate($validatedData['expected_return_date']);

            // Verifica se a data de devolução excede o limite de 7 dias para advogados
            if ($loan->collaborator->type && $loan->collaborator->type->id === 4) {
                $loanStartDate = Date::parse($validatedData['loan_date']);
                $loanDueDate = Date::parse($dueDate);

                $daysDifference = $loanStartDate->diffInDays($loanDueDate);

                if ($daysDifference > 7) {
                    return back()->with('error', 'O prazo de empréstimo para advogados não pode exceder 7 dias.');
                }
            }

            $validatedData['expected_return_date'] = $dueDate;
        }

        $loan->update($validatedData);

        if($loan->loan_status_id === "2" | $loan->loan_status_id === "3") {
            $collaborator = Collaborator::findOrFail($validatedData['collaborator_id']);
            Mail::to($collaborator->email)->send(new ReturnNotification($loan, $collaborator));
        }


        return redirect()->route('loans.show', $loan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $loan = Loan::findOrFail($id);
        $loan->delete();
        return redirect()->route('loans.index');
    }

    private function calculateDueDate($date)
    {
        $date = Date::parse($date);

        if ($date->isWeekend()) {
            // Se a data cair no final de semana, ajuste para a próxima segunda-feira
            $date = $date->next(Carbon::MONDAY);
        }

        return $date->toDateString();
    }
}
