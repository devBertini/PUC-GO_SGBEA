<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ReservationStatus;

class ReservationStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservationStatuses = ReservationStatus::all();
        return view('reservation_statuses.index', compact('reservationStatuses'));
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
            'description' => 'required|string|max:255',
        ]);
        $reservationStatus = ReservationStatus::create($validatedData);
        return redirect()->route('reservation_statuses.show', $reservationStatus);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $reservationStatus = ReservationStatus::findOrFail($id);
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
        ]);
        $reservationStatus->update($validatedData);
        return redirect()->route('reservation_statuses.show', $reservationStatus);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservationStatus = ReservationStatus::findOrFail($id);
        $reservationStatus->delete();
        return redirect()->route('reservation_statuses.index');
    }
}
