@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Detalhes do Advogado</h1>
    <form action="{{ route('lawyer_details.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="collaborator_id">ID do Colaborador:</label>
            <input type="number" class="form-control" name="collaborator_id" id="collaborator_id" required>
        </div>
        <div class="form-group">
            <label for="oab_number">Número da OAB:</label>
            <input type="text" class="form-control" name="oab_number" id="oab_number" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
