@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Área de Advocacia</h1>
    <form action="{{ route('law_areas.update', $lawArea->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="description">Descrição:</label>
            <input type="text" class="form-control" name="description" id="description" value="{{ $lawArea->description }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
