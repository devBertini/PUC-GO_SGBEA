@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Criar Novo Empréstimo</h1>
        <form action="{{ route('loans.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="copy_id">Cópia:</label>
                <select name="copy_id" id="copy_id" class="form-control">
                    @foreach ($copies as $copy)
                        <option value="{{ $copy->id }}">{{ $copy->book->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="collaborator_id">Colaborador:</label>
                <select name="collaborator_id" id="collaborator_id" class="form-control">
                    @foreach ($collaborators as $collaborator)
                        <option value="{{ $collaborator->id }}">{{ $collaborator->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="loan_date">Data do Empréstimo:</label>
                <input type="date" name="loan_date" id="loan_date" class="form-control" value="{{ date('Y-m-d') }}">
            </div>
            <div class="form-group">
                <label for="expected_return_date">Data de Devolução Esperada:</label>
                <input type="date" name="expected_return_date" id="expected_return_date" class="form-control">
            </div>
            <div class="form-group">
                <label for="loan_status_id">Status:</label>
                <select name="loan_status_id" id="loan_status_id" class="form-control">
                    @foreach ($loanStatuses as $status)
                        <option value="{{ $status->id }}">{{ $status->description }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="fine">Multa:</label>
                <input type="number" name="fine" id="fine" class="form-control">
            </div>
            <a href="{{ route('loans.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-success">Criar Empréstimo</button>
        </form>
    </div>
@endsection
