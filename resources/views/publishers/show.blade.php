@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $publisher->name }}</h1>
        <a href="{{ route('publishers.edit', $publisher->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('publishers.index') }}" class="btn btn-primary">Voltar para Editoras</a>
    </div>
@endsection
