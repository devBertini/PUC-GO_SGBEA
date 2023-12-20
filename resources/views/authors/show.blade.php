@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $author->name }}</h1>
        <a href="{{ route('authors.index') }}" class="btn btn-primary">Voltar para Autores</a>
        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning">Editar</a>
    </div>
@endsection