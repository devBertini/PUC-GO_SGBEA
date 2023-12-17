<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Loan;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::all();
        return view('loans.index', compact('loans'));
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
            'loan_date' => 'required|date',
            'expected_return_date' => 'required|date',
            'loan_status_id' => 'required|exists:loan_statuses,id',
            // 'fine' is optional
        ]);
        $loan = Loan::create($validatedData);
        return redirect()->route('loans.show', $loan);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $loan = Loan::findOrFail($id);
        return view('loans.show', compact('loan'));
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
        $loan = Loan::findOrFail($id);
        $validatedData = $request->validate([
            'copy_id' => 'required|exists:copies,id',
            'collaborator_id' => 'required|exists:collaborators,id',
            'loan_date' => 'required|date',
            'expected_return_date' => 'required|date',
            'actual_return_date' => 'nullable|date',
            'loan_status_id' => 'required|exists:loan_statuses,id',
            'fine' => 'nullable|numeric'
        ]);
        $loan->update($validatedData);
        return redirect()->route('loans.show', $loan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $loan = Loan::findOrFail($id);
        $loan->delete();
        return redirect()->route('loans.index');
    }
}
