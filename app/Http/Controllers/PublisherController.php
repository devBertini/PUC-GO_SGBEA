<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Publisher;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::all();
        return view('publishers.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $publishers = Publisher::all();
        return view('publishers.create', compact('publishers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $publisher = Publisher::create($validatedData);

        return redirect()->route('publishers.show', $publisher);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $publisher = Publisher::findOrFail($id);
        return view('publishers.show', compact('publisher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $publisher = Publisher::findOrFail($id);

        return view('publishers.edit', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $publisher = Publisher::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $publisher->update($validatedData);

        return redirect()->route('publishers.show', $publisher);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $publisher = Publisher::findOrFail($id);

        // Verificar se existem livros vinculados a esta editora
        if ($publisher->books->count() > 0) {
            return redirect()->route('publishers.index')
                ->with('error', 'Não é possível excluir a editora porque há livro(s) vinculado(s) a ela. Remova o(s) livro(s) primeiro.');
        }

        $publisher->delete();
        return redirect()->route('publishers.index');
    }
}
