@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Status do Exemplar</h1>
    <form action="{{ route('copy_statuses.update', $copyStatus->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="description">Descrição:</label>
            <input type="text" class="form-control" name="description" id="description" value="{{ $copyStatus->description }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
