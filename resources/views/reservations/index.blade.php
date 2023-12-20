@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Reservas</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cópia</th>
                <th>Colaborador</th>
                <th>Data de Reserva</th>
                <th>Data Limite</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->copy->location }}</td>
                <td>{{ $reservation->collaborator->name }}</td>
                <td>{{ Carbon\Carbon::parse($reservation->reservation_date)->format('d/m/Y') }}</td>
                <td>{{ Carbon\Carbon::parse($reservation->limit_date)->format('d/m/Y') }}</td>
                <td>{{ $reservation->status->description }}</td>
                <td>
                    <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-primary">Ver</a>
                    <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta reserva?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('reservations.create') }}" class="btn btn-success">Nova Reserva</a>
</div>
@endsection
