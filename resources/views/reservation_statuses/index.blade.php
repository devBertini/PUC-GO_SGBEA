@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Status das Reservas</h1>
    <a href="{{ route('reservation_statuses.create') }}" class="btn btn-primary">Adicionar Status</a>
    <table class="table">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservationStatuses as $status)
            <tr>
                <td>{{ $status->description }}</td>
                <td>
                    <a href="{{ route('reservation_statuses.edit', $status->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('reservation_statuses.destroy', $status->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
