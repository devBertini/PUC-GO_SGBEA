<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CopyStatus;

class CopyStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $copyStatuses = CopyStatus::all();
        return view('copy_statuses.index', compact('copyStatuses'));
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
        $copyStatus = CopyStatus::create($validatedData);
        return redirect()->route('copy_statuses.show', $copyStatus);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $copyStatus = CopyStatus::findOrFail($id);
        return view('copy_statuses.show', compact('copyStatus'));
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
        $copyStatus = CopyStatus::findOrFail($id);
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
        ]);
        $copyStatus->update($validatedData);
        return redirect()->route('copy_statuses.show', $copyStatus);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $copyStatus = CopyStatus::findOrFail($id);
        $copyStatus->delete();
        return redirect()->route('copy_statuses.index');
    }
}
