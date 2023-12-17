<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        //
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
        $reservation = Reservation::create($validatedData);
        return redirect()->route('reservations.show', $reservation);
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
        //
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
        $reservation->update($validatedData);
        return redirect()->route('reservations.show', $reservation);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return redirect()->route('reservations.index');
    }
}
