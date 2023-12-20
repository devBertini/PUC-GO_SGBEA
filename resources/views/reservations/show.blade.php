@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Reserva</h1>
    <table class="table">
        <tr>
            <th>ID:</th>
            <td>{{ $reservation->id }}</td>
        </tr>
        <tr>
            <th>Cópia:</th>
            <td>{{ $reservation->copy->location }}</td>
        </tr>
        <tr>
            <th>Colaborador:</th>
            <td>{{ $reservation->collaborator->name }}</td>
        </tr>
        <tr>
            <th>Data de Reserva:</th>
            <td>{{ $reservation->reservation_date }}</td>
        </tr>
        <tr>
            <th>Data Limite:</th>
            <td>{{ $reservation->limit_date }}</td>
        </tr>
        <tr>
            <th>Status:</th>
            <td>{{ $reservation->status->description }}</td>
        </tr>
    </table>
    <a href="{{ route('reservations.index') }}" class="btn btn-primary">Voltar</a>
    <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-primary">Editar</a>
</div>
@endsection
