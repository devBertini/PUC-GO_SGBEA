<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LoanStatus;

class LoanStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loanStatuses = LoanStatus::all();
        return view('loan_statuses.index', compact('loanStatuses'));
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
        $loanStatus = LoanStatus::create($validatedData);
        return redirect()->route('loan_statuses.show', $loanStatus);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $loanStatus = LoanStatus::findOrFail($id);
        return view('loan_statuses.show', compact('loanStatus'));
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
        $loanStatus = LoanStatus::findOrFail($id);
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
        ]);
        $loanStatus->update($validatedData);
        return redirect()->route('loan_statuses.show', $loanStatus);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $loanStatus = LoanStatus::findOrFail($id);
        $loanStatus->delete();
        return redirect()->route('loan_statuses.index');
    }
}
