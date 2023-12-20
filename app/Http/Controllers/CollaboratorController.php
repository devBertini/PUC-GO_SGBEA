<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CollaboratorHistory;
use App\Models\CollaboratorType;
use App\Models\LawyerDetail;
use App\Models\Collaborator;
use Carbon\Carbon;

class CollaboratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collaborators = Collaborator::all();
        return view('collaborators.index', compact('collaborators'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $collaborators = Collaborator::all();
        $collaboratorTypes = CollaboratorType::all();
        return view('collaborators.create', compact('collaborators', 'collaboratorTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:collaborators',
            'phone' => 'required|string',
            'status' => 'required|boolean',
            'collaborator_type_id' => 'required|exists:collaborator_types,id',
        ]);

        // Criar o colaborador com os campos adicionais
        $collaborator = Collaborator::create($validatedData);

        // Verificação se o tipo de colaborador é advogado
        if ($request->input('oab_number')) {
            // Se for advogado, insira os detalhes do advogado na tabela 'lawyer_details'
            LawyerDetail::create([
                'collaborator_id' => $collaborator->id,
                'oab_number' => $request->input('oab_number')
            ]);

            CollaboratorHistory::create([
                'collaborator_id' => $collaborator->id,
                'collaborator_type_id' => $collaborator->collaborator_type_id,
                'start_date' => Carbon::now(), // Data atual como data de início
                'end_date' => null,
            ]);
        }

        return redirect()->route('collaborators.show', $collaborator);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $collaborator = Collaborator::findOrFail($id);
        return view('collaborators.show', compact('collaborator'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $collaborator = Collaborator::findOrFail($id);
        $collaboratorTypes = CollaboratorType::all();

        return view('collaborators.edit', compact('collaborator', 'collaboratorTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $collaborator = Collaborator::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:collaborators,email,' . $id,
            'phone' => 'required|string',
            'status' => 'required|boolean',
            'collaborator_type_id' => 'required|exists:collaborator_types,id',
            'oab_number' => ($request->input('collaborator_type_id') == 1) ? 'required_if:collaborator_type_id,1' : '', // Apenas se o tipo for "Advogado"
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
        ]);

        // Atualize as informações básicas do colaborador
        $collaborator->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'status' => $validatedData['status'],
            'collaborator_type_id' => $validatedData['collaborator_type_id'],
        ]);

        // Verifique se o colaborador é um advogado e atualize o número da OAB, se aplicável
        if ($collaborator->collaborator_type_id == 4 && isset($validatedData['oab_number'])) {
            if ($collaborator->lawyerDetail) {
                $collaborator->lawyerDetail->update([
                    'oab_number' => $validatedData['oab_number'],
                ]);
            } else {
                LawyerDetail::create([
                    'collaborator_id' => $collaborator->id,
                    'oab_number' => $validatedData['oab_number'],
                ]);
            }
        } elseif ($collaborator->lawyerDetail) {
            // Se o colaborador não é um advogado, remova os detalhes do advogado, se existirem
            $collaborator->lawyerDetail->delete();
        }

        // Atualizar informações de histórico
        if ($collaborator->history->count() > 0) {
            $history = $collaborator->history->first();
            $history->update([
                'start_date' => $validatedData['start_date'],
                'end_date' => $validatedData['end_date'],
            ]);
        } else {
            CollaboratorHistory::create([
                'collaborator_id' => $collaborator->id,
                'collaborator_type_id' => $validatedData['collaborator_type_id'],
                'start_date' => $validatedData['start_date'],
                'end_date' => $validatedData['end_date'],
            ]);
        }

        return redirect()->route('collaborators.show', $collaborator);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $collaborator = Collaborator::findOrFail($id);

        // Verificar se existem empréstimos ou reservas vinculados ao colaborador
        if ($collaborator->loans->count() > 0 || $collaborator->reservations->count() > 0 || $collaborator->history->count() > 0 || $collaborator->lawyerDetail->count() > 0) {
            return redirect()->route('collaborators.index')
                ->with('error', 'Não é possível excluir o colaborador. Há vínculos a ele.');
        }

        $collaborator->delete();
        return redirect()->route('collaborators.index');
    }
}
