@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Empréstimo</h1>
    <form action="{{ route('loans.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="copy_id">ID do Exemplar:</label>
            <input type="number" class="form-control" name="copy_id" id="copy_id" required>
        </div>
        <div class="form-group">
            <label for="collaborator_id">ID do Colaborador:</label>
            <input type="number" class="form-control" name="collaborator_id" id="collaborator_id" required>
        </div>
        <div class="form-group">
            <label for="loan_date">Data do Empréstimo:</label>
            <input type="date" class="form-control" name="loan_date" id="loan_date" required>
        </div>
        <div class="form-group">
            <label for="expected_return_date">Data Prevista de Devolução:</label>
            <input type="date" class="form-control" name="expected_return_date" id="expected_return_date" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
