@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Colaborador</h1>
    <form action="{{ route('collaborators.update', $collaborator->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $collaborator->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $collaborator->email }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Telefone:</label>
            <input type="text" class="form-control" name="phone" id="phone" value="{{ $collaborator->phone }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" name="status" id="status" required>
                <option value="1" {{ $collaborator->status == 1 ? 'selected' : '' }}>Ativo</option>
                <option value="0" {{ $collaborator->status == 0 ? 'selected' : '' }}>Inativo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="collaborator_type_id">Tipo de Colaborador:</label>
            <select class="form-control" name="collaborator_type_id" id="collaborator_type_id" required>
                @foreach ($collaboratorTypes as $type)
                    <option value="{{ $type->id }}" {{ $collaborator->collaborator_type_id == $type->id ? 'selected' : '' }}>{{ $type->description }}</option>
                @endforeach
            </select>
        </div>
        @if ($collaborator->collaborator_type_id == 4)
            <div class="form-group">
                <label for="oab_number">Número da OAB:</label>
                <input type="text" class="form-control" name="oab_number" id="oab_number" value="{{ $collaborator->lawyerDetail->oab_number ?? '' }}">
            </div>
        @endif

        <!-- Campos para editar o histórico do colaborador -->
        <div class="form-group">
            <label for="start_date">Data de Início:</label>
            <input type="date" class="form-control" name="start_date" id="start_date" value="{{ $collaborator->history->first()->start_date }}">
        </div>
        <div class="form-group">
            <label for="end_date">Data de Término:</label>
            <input type="date" class="form-control" name="end_date" id="end_date" value="{{ $collaborator->history->first()->end_date }}">
        </div>

        <!-- Botão para atualizar todas as informações -->
        <button type="submit" class="btn btn-primary">Atualizar Informações</button>
    </form>
</div>
@endsection
