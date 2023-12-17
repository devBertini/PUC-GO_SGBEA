<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CollaboratorHistory;

class CollaboratorHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collaboratorHistories = CollaboratorHistory::all();
        return view('collaborator_histories.index', compact('collaboratorHistories'));
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
            'collaborator_id' => 'required|exists:collaborators,id',
            'collaborator_type_id' => 'required|exists:collaborator_types,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);
        $collaboratorHistory = CollaboratorHistory::create($validatedData);
        return redirect()->route('collaborator_histories.show', $collaboratorHistory);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $collaboratorHistory = CollaboratorHistory::findOrFail($id);
        return view('collaborator_histories.show', compact('collaboratorHistory'));
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
        $collaboratorHistory = CollaboratorHistory::findOrFail($id);
        $validatedData = $request->validate([
            'collaborator_type_id' => 'required|exists:collaborator_types,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);
        $collaboratorHistory->update($validatedData);
        return redirect()->route('collaborator_histories.show', $collaboratorHistory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $collaboratorHistory = CollaboratorHistory::findOrFail($id);
        $collaboratorHistory->delete();
        return redirect()->route('collaborator_histories.index');
    }
}
