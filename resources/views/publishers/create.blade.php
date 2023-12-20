@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nova Editora</h1>
        <form method="POST" action="{{ route('publishers.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <a href="{{ route('publishers.index') }}" class="btn btn-primary">Voltar para Editoras</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection
