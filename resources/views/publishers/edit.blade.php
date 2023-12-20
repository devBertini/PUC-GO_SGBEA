@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Editora</h1>
    <form action="{{ route('publishers.update', $publisher->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome da Editora:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $publisher->name }}" required>
        </div>
        <a href="{{ route('publishers.index') }}" class="btn btn-primary">Voltar para Editoras</a>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
