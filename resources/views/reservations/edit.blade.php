@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Reserva</h1>
    <form method="POST" action="{{ route('reservations.update', $reservation->id) }}">
        @csrf
        @method('PUT') <!-- Certifique-se de definir o método como PUT -->
        <div class="form-group">
            <label for="copy_id">Cópia:</label>
            <select name="copy_id" id="copy_id" class="form-control">
                @foreach($copies as $copy)
                    <option value="{{ $copy->id }}" {{ $copy->id == $reservation->copy_id ? 'selected' : '' }}>{{ $copy->book->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="collaborator_id">Colaborador:</label>
            <select name="collaborator_id" id="collaborator_id" class="form-control">
                @foreach($collaborators as $collaborator)
                    <option value="{{ $collaborator->id }}" {{ $collaborator->id == $reservation->collaborator_id ? 'selected' : '' }}>{{ $collaborator->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="reservation_date">Data de Reserva:</label>
            <input type="date" name="reservation_date" id="reservation_date" class="form-control" value="{{ $reservation->reservation_date }}">
        </div>
        <div class="form-group">
            <label for="limit_date">Data Limite:</label>
            <input type="date" name="limit_date" id="limit_date" class="form-control" value="{{ $reservation->limit_date }}">
        </div>
        <div class="form-group">
            <label for="reservation_status_id">Status:</label>
            <select name="reservation_status_id" id="reservation_status_id" class="form-control">
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}" {{ $status->id == $reservation->reservation_status_id ? 'selected' : '' }}>{{ $status->description }}</option>
                @endforeach
            </select>
        </div>
        <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
