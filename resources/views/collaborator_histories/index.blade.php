@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Histórico de Funções dos Colaboradores</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID do Colaborador</th>
                <th>Tipo</th>
                <th>Data de Início</th>
                <th>Data de Término</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collaboratorHistories as $history)
            <tr>
                <td>{{ $history->collaborator_id }}</td>
                <td>{{ $history->type->description }}</td>
                <td>{{ $history->start_date }}</td>
                <td>{{ $history->end_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
