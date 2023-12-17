@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Histórico do Colaborador</h1>
    <form action="{{ route('collaborator_histories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="collaborator_id">ID do Colaborador:</label>
            <input type="number" class="form-control" name="collaborator_id" id="collaborator_id" required>
        </div>
        <div class="form-group">
            <label for="collaborator_type_id">Tipo de Colaborador:</label>
            <select class="form-control" name="collaborator_type_id" id="collaborator_type_id">
                <!-- Opções de tipos de colaboradores -->
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Data de Início:</label>
            <input type="date" class="form-control" name="start_date" id="start_date" required>
        </div>
        <div class="form-group">
            <label for="end_date">Data de Término:</label>
            <input type="date" class="form-control" name="end_date" id="end_date">
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
