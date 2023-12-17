<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LawyerDetail;

class LawyerDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lawyerDetails = LawyerDetail::all();
        return view('lawyer_details.index', compact('lawyerDetails'));
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
            'oab_number' => 'required|string|max:255',
        ]);
        $lawyerDetail = LawyerDetail::create($validatedData);
        return redirect()->route('lawyer_details.show', $lawyerDetail);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lawyerDetail = LawyerDetail::findOrFail($id);
        return view('lawyer_details.show', compact('lawyerDetail'));
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
        $lawyerDetail = LawyerDetail::findOrFail($id);
        $validatedData = $request->validate([
            'oab_number' => 'required|string|max:255',
        ]);
        $lawyerDetail->update($validatedData);
        return redirect()->route('lawyer_details.show', $lawyerDetail);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lawyerDetail = LawyerDetail::findOrFail($id);
        $lawyerDetail->delete();
        return redirect()->route('lawyer_details.index');
    }
}
