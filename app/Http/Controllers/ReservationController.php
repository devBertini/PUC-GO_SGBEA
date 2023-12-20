<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

use App\Models\ReservationStatus;
use App\Models\Collaborator;
use App\Models\Reservation;
use App\Models\Copy;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $collaborators = Collaborator::all();
        $reservations = Reservation::all();
        $availableCopies = Copy::where('copy_status_id', 1)->get();
        $statuses = ReservationStatus::all();
        return view('reservations.create', compact('reservations', 'availableCopies', 'collaborators', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'copy_id' => 'required|exists:copies,id',
            'collaborator_id' => 'required|exists:collaborators,id',
            'reservation_date' => 'required|date',
            'limit_date' => 'required|date',
            'reservation_status_id' => 'required|exists:reservation_statuses,id',
        ]);

        // Verifica se o colaborador é um advogado (assumindo que 1 é o ID para "advogado")
        $collaborator = Collaborator::find($validatedData['collaborator_id']);
        if ($collaborator->collaborator_type_id != 4) {
            return back()->withError('Somente advogados podem fazer reservas de livros.');
        }

        // Verifica se a data limite é maior do que 7 dias a partir da data de reserva
        if (Carbon::now()->diffInDays($limitDate, false) > $maxLoanDays) {
            return back()->withError('A reserva não pode exceder 7 dias a partir da data de reserva.');
        }

        DB::beginTransaction();
    
        try {
            // Marca o livro relacionado à cópia como reservado (copy_status = 3)
            $copy = Copy::find($validatedData['copy_id']);
            $copy->copy_status_id = 3;
            $copy->save();
    
            // Crie a reserva após atualizar o status do livro
            $reservation = Reservation::create($validatedData);
    
            // Commit da transação
            DB::commit();
    
            return redirect()->route('reservations.show', $reservation);
        } catch (\Exception $e) {
            // Rollback em caso de erro
            DB::rollBack();
    
            return back()->withError('Erro ao criar a reserva. Por favor, tente novamente.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->reservation_date = Carbon::parse($reservation->reservation_date)->format('Y-m-d');
        $reservation->limit_date = Carbon::parse($reservation->limit_date)->format('Y-m-d');

        $copies = Copy::where('copy_status_id', 1)->get();
        $collaborators = Collaborator::all();
        $statuses = ReservationStatus::all();
        return view('reservations.edit', compact('reservation', 'copies', 'collaborators', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reservation = Reservation::findOrFail($id);

        $validatedData = $request->validate([
            'copy_id' => 'required|exists:copies,id',
            'collaborator_id' => 'required|exists:collaborators,id',
            'reservation_date' => 'required|date',
            'limit_date' => 'required|date',
            'reservation_status_id' => 'required|exists:reservation_statuses,id',
        ]);

        // Verifica se o copy_id foi alterado
        if ($reservation->copy_id != $validatedData['copy_id']) {
            Copy::where('id', $reservation->copy_id)->update(['copy_status_id' => 1]);
            Copy::where('id', $validatedData['copy_id'])->update(['copy_status_id' => 2]);
        }

        // Verifica se o status foi alterado para expirado ou cancelado
        if ($reservation->reservation_status_id != $validatedData['reservation_status_id']) {
            if ($validatedData['reservation_status_id'] == 3 || $validatedData['reservation_status_id'] == 4) {
                Copy::where('id', $reservation->copy_id)->update(['copy_status_id' => 1]);
            }
        }

        $reservation->update($validatedData);

        return redirect()->route('reservations.index', $reservation->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservation = Reservation::findOrFail($id);

        // Verifica o status da reserva antes de excluí-la
        if ($reservation->reservation_status_id == 1) {
            DB::beginTransaction();

            try {
                // Marca o livro relacionado à cópia como disponível (copy_status = 1)
                $copy = Copy::find($reservation->copy_id);
                $copy->copy_status_id = 1;
                $copy->save();

                // Exclui a reserva após atualizar o status do livro
                $reservation->delete();

                // Commit da transação
                DB::commit();
            } catch (\Exception $e) {
                // Rollback em caso de erro
                DB::rollBack();
                return back()->withError('Erro ao excluir a reserva. Por favor, tente novamente.');
            }
        } else {
            // Se a reserva não estiver ativa, exclui sem atualizar o status do livro
            $reservation->delete();
        }

        return redirect()->route('reservations.index');
    }
}
