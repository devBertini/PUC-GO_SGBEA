@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Colaborador</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $collaborator->name }}</h5>
            <p class="card-text">Email: {{ $collaborator->email }}</p>
            <p class="card-text">Telefone: {{ $collaborator->phone }}</p>
            <p class="card-text">Status: {{ $collaborator->status == 1 ? 'Ativo' : 'Inativo' }}</p>
            @if ($collaborator->collaborator_type_id == 4)
                <p class="card-text">Número da OAB: {{ $collaborator->lawyerDetail->oab_number }}</p>
            @endif
            <a href="{{ route('collaborators.index') }}" class="btn btn-primary">Voltar para Colaboradores</a>
            <a href="{{ route('collaborators.edit', $collaborator->id) }}" class="btn btn-warning">Editar</a>
        </div>
    </div>

    <h2>Histórico</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Tipo de Colaborador</th>
                <th>Data de Início</th>
                <th>Data de Término</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collaborator->history as $history)
                <tr>
                    <td>{{ $history->type->description }}</td>
                    <td>{{ $history->start_date }}</td>
                    <td>{{ $history->end_date ?? 'Não aplicado' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
