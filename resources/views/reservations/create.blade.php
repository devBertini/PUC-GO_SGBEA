@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Reserva</h1>
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="copy_id">ID do Exemplar:</label>
            <input type="number" class="form-control" name="copy_id" id="copy_id" required>
        </div>
        <div class="form-group">
            <label for="collaborator_id">ID do Colaborador:</label>
            <input type="number" class="form-control" name="collaborator_id" id="collaborator_id" required>
        </div>
        <div class="form-group">
            <label for="reservation_date">Data da Reserva:</label>
            <input type="date" class="form-control" name="reservation_date" id="reservation_date" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
