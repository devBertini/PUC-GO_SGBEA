<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CollaboratorType;

class CollaboratorTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collaboratorTypes = CollaboratorType::all();
        return view('collaborator_types.index', compact('collaboratorTypes'));
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
        $collaboratorType = CollaboratorType::create($validatedData);
        return redirect()->route('collaborator_types.show', $collaboratorType);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $collaboratorType = CollaboratorType::findOrFail($id);
        return view('collaborator_types.show', compact('collaboratorType'));
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
        $collaboratorType = CollaboratorType::findOrFail($id);
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
        ]);
        $collaboratorType->update($validatedData);
        return redirect()->route('collaborator_types.show', $collaboratorType);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $collaboratorType = CollaboratorType::findOrFail($id);
        $collaboratorType->delete();
        return redirect()->route('collaborator_types.index');
    }
}
