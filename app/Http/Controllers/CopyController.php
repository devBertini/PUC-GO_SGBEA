<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Copy;

class CopyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $copies = Copy::all();
        return view('copies.index', compact('copies'));
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
            'book_id' => 'required|exists:books,id',
            'copy_status_id' => 'required|exists:copy_statuses,id',
            'location' => 'required|string'
        ]);
        $copy = Copy::create($validatedData);
        return redirect()->route('copies.show', $copy);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $copy = Copy::findOrFail($id);
        return view('copies.show', compact('copy'));
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
        $copy = Copy::findOrFail($id);
        $validatedData = $request->validate([
            'book_id' => 'required|exists:books,id',
            'copy_status_id' => 'required|exists:copy_statuses,id',
            'location' => 'required|string'
        ]);
        $copy->update($validatedData);
        return redirect()->route('copies.show', $copy);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $copy = Copy::findOrFail($id);
        $copy->delete();
        return redirect()->route('copies.index');
    }
}
