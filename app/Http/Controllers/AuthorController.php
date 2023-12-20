<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        return view('authors.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $author = Author::create($validatedData);
        return redirect()->route('authors.show', $author);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $author = Author::findOrFail($id);
        return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $author = Author::findOrFail($id);

        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $author = Author::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $author->update($validatedData);
        return redirect()->route('authors.show', $author);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::findOrFail($id);

        // Verificar se existem livros vinculados a esta editora
        if ($author->books->count() > 0) {
            return redirect()->route('authors.index')
                ->with('error', 'Não é possível excluir o autor porque há livro(s) vinculado(s) a ele(a). Remova o(s) livro(s) primeiro.');
        }

        $author->delete();
        return redirect()->route('authors.index');
    }
}
