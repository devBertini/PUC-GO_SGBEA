@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Relatório de Reservas</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Exemplar</th>
                <th>Colaborador</th>
                <th>Data da Reserva</th>
                <th>Data Limite</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->copy->book->title }}</td>
                <td>{{ $reservation->collaborator->name }}</td>
                <td>{{ $reservation->reservation_date }}</td>
                <td>{{ $reservation->limit_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
