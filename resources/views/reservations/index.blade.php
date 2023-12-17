@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reservas</h1>
    <a href="{{ route('reservations.create') }}" class="btn btn-primary">Adicionar Reserva</a>
    <table class="table">
        <thead>
            <tr>
                <th>Exemplar</th>
                <th>Colaborador</th>
                <th>Data da Reserva</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->copy->book->title }}</td>
                <td>{{ $reservation->collaborator->name }}</td>
                <td>{{ $reservation->reservation_date }}</td>
                <td>{{ $reservation->status->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
