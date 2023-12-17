<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Collaborator;

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
        //
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
        $collaborator = Collaborator::create($validatedData);
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
        //
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
        ]);
        $collaborator->update($validatedData);
        return redirect()->route('collaborators.show', $collaborator);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $collaborator = Collaborator::findOrFail($id);
        $collaborator->delete();
        return redirect()->route('collaborators.index');
    }
}
