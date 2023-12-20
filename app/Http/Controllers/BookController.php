<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

use App\Models\Publisher;
use App\Models\LawArea;
use App\Models\Author;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $publishers = Publisher::all();
        $authors = Author::all();
        $lawAreas = LawArea::all();
        return view('books.create', compact('publishers', 'authors', 'lawAreas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Obtenha o valor do campo 'cost' do formulário
        $cost = $request->input('cost');

        // Substitua todas as vírgulas por pontos
        $formattedCost = str_replace(',', '.', $cost);

        // Atualize o valor do campo 'cost' no request
        $request->merge(['cost' => $formattedCost]);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'publisher_id' => 'required|exists:publishers,id',
            'year' => 'required|integer',
            'edition' => 'required|string|max:255',
            'acquisition_date' => 'required|date',
            'cost' => 'required|numeric'
        ]);

        if ($request->input('year') > date('Y')) {
            return back()
                ->with('error', 'O ano não pode ser maior que o ano atual.');
            // return back()->withInput()->withErrors(['year' => 'O ano não pode ser maior que o ano atual.']);
        }
        
        if ($request->input('acquisition_date') > now()->format('Y-m-d')) {
            return back()
                ->with('error', 'A data de aquisição não pode ser maior que a data atual.');
            // return back()->withInput()->withErrors(['acquisition_date' => 'A data de aquisição não pode ser maior que a data atual.']);
        }

        $book = Book::create($validatedData);

        // Associa autores ao livro
        $book->authors()->attach($request->input('authors'));

        // Associar área de direito ao livro
        $book->lawAreas()->attach($request->input('law_areas'));

        return redirect()->route('books.show', $book);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        $authors = Author::all();
        $publishers = Publisher::all();
        $lawAreas = LawArea::all();

        return view('books.edit', compact('book', 'publishers', 'authors', 'lawAreas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        // Obtenha o valor do campo 'cost' do formulário
        $cost = $request->input('cost');

        // Substitua todas as vírgulas por pontos
        $formattedCost = str_replace(',', '.', $cost);

        // Atualize o valor do campo 'cost' no request
        $request->merge(['cost' => $formattedCost]);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'publisher_id' => 'required|exists:publishers,id',
            'year' => 'required|integer',
            'edition' => 'required|string|max:255',
            'acquisition_date' => 'required|date',
            'cost' => 'required|numeric'
        ]);

        if ($request->input('year') > date('Y')) {
            return back()->with('error', 'O ano do livro não pode ser maior que o ano atual.');
        }
        
        if ($request->input('acquisition_date') > now()->format('Y-m-d')) {
            return back()->with('error', 'A data de aquisição do livro não pode ser maior que a data atual.');
        }

        // Atualize os campos simples do livro
        $book->update($validatedData);

        // Atualize os autores associados ao livro
        $book->authors()->sync($request->input('authors'));

        // Atualize as áreas jurídicas associadas ao livro
        $book->lawAreas()->sync($request->input('law_areas'));

        return redirect()->route('books.show', $book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
    
        // Remova as relações com autores e área
        $book->authors()->detach();
        $book->lawAreas()->detach();

        // Agora você pode excluir o livro
        $book->delete();

        return redirect()->route('books.index');
    }
}
