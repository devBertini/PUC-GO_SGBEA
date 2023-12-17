@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Colaborador</h1>
    <form action="{{ route('collaborators.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Telefone:</label>
            <input type="text" class="form-control" name="phone" id="phone" required>
        </div>
        <div class="form-group">
            <label for="collaborator_type_id">Tipo de Colaborador:</label>
            <select class="form-control" name="collaborator_type_id" id="collaborator_type_id">
                <!-- Opções de tipos de colaboradores -->
            </select>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
