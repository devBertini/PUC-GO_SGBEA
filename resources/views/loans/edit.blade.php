@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Empréstimo</h1>
        <form action="{{ route('loans.update', $loan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                
                <label for="copy_id">Cópia:</label>
                <select name="copy_id" id="copy_id" class="form-control">
                    @foreach ($copies as $copy)
                        <option value="{{ $copy->id }}" {{ $copy->id == $loan->copy_id ? 'selected' : '' }}>
                            {{ $copy->book->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="collaborator_id">Colaborador:</label>
                <select name="collaborator_id" id="collaborator_id" class="form-control">
                    @foreach ($collaborators as $collaborator)
                        <option value="{{ $collaborator->id }}" {{ $collaborator->id == $loan->collaborator_id ? 'selected' : '' }}>
                            {{ $collaborator->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="loan_date">Data do Empréstimo:</label>
                <input type="date" name="loan_date" id="loan_date" class="form-control" value="{{ $loan->loan_date }}">
            </div>
            <div class="form-group">
                <label for="expected_return_date">Data de Devolução Esperada:</label>
                <input type="date" name="expected_return_date" id="expected_return_date" class="form-control" value="{{ $loan->expected_return_date }}">
            </div>
            <div class="form-group">
                <label for="actual_return_date">Data de Devolução Efetiva:</label>
                <input type="date" name="actual_return_date" id="actual_return_date" class="form-control" value="{{ $loan->actual_return_date }}">
            </div>
            <div class="form-group">
                <label for="loan_status_id">Status:</label>
                <select name="loan_status_id" id="loan_status_id" class="form-control">
                    @foreach ($loanStatuses as $status)
                        <option value="{{ $status->id }}" {{ $status->id == $loan->loan_status_id ? 'selected' : '' }}>
                            {{ $status->description }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="fine">Multa:</label>
                <input type="number" name="fine" id="fine" class="form-control" value="{{ $loan->fine }}">
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="{{ route('loans.show', $loan->id) }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
