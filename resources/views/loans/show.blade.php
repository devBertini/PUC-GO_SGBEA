@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes do Empréstimo</h1>
        <table class="table">
            <tr>
                <th>ID:</th>
                <td>{{ $loan->id }}</td>
            </tr>
            <tr>
                <th>Cópia:</th>
                <td>{{ $loan->copy->book->title }}</td>
            </tr>
            <tr>
                <th>Colaborador:</th>
                <td>{{ $loan->collaborator->name }}</td>
            </tr>
            <tr>
                <th>Data do Empréstimo:</th>
                <td>{{ Carbon\Carbon::parse($loan->loan_date)->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <th>Data de Devolução Esperada:</th>
                <td>{{ Carbon\Carbon::parse($loan->expected_return_date)->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <th>Data de Devolução Efetiva:</th>
                <td>{{ Carbon\Carbon::parse($loan->actual_return_date)->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <th>Status:</th>
                <td>{{ $loan->status->description }}</td>
            </tr>
            <tr>
                <th>Multa:</th>
                <td>{{ $loan->fine }}</td>
            </tr>
        </table>
        <a href="{{ route('loans.index') }}" class="btn btn-secondary">Voltar</a>
        <a href="{{ route('loans.edit', $loan->id) }}" class="btn btn-primary">Editar</a>
    </div>
@endsection
