@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Área de Advocacia</h1>
    <form action="{{ route('law_areas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="description">Descrição:</label>
            <input type="text" class="form-control" name="description" id="description" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
