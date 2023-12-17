@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Colaborador</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $collaborator->name }}</h5>
            <p class="card-text">Email: {{ $collaborator->email }}</p>
            <p class="card-text">Telefone: {{ $collaborator->phone }}</p>
            <p class="card-text">Tipo: {{ $collaborator->type->description }}</p>
            <a href="{{ route('collaborators.edit', $collaborator->id) }}" class="btn btn-warning">Editar</a>
        </div>
    </div>
</div>
@endsection
