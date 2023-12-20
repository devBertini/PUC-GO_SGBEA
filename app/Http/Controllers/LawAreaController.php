<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LawArea;

class LawAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lawAreas = LawArea::all();
        return view('law_areas.index', compact('lawAreas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lawAreas = LawArea::all();
        return view('law_areas.create', compact('lawAreas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
        ]);
        $lawArea = LawArea::create($validatedData);
        return redirect()->route('law_areas.show', $lawArea);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lawArea = LawArea::findOrFail($id);
        return view('law_areas.show', compact('lawArea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lawArea = LawArea::findOrFail($id);

        return view('law_areas.edit', compact('lawArea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lawArea = LawArea::findOrFail($id);
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
        ]);
        $lawArea->update($validatedData);
        return redirect()->route('law_areas.show', $lawArea);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lawArea = LawArea::findOrFail($id);

        // Verificar se existem livros vinculados a esta editora
        if ($lawArea->books->count() > 0) {
            return redirect()->route('law_areas.index')
                ->with('error', 'Não é possível excluir a Área de Advocacia porque há livro(s) vinculado(s) a ele(a). Remova o(s) livro(s) primeiro.');
        }

        $lawArea->delete();
        return redirect()->route('law_areas.index');
    }
}
