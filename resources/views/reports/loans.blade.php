@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Histórico de Empréstimos</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID do Empréstimo</th>
                <th>Data de Empréstimo</th>
                <th>Data Prevista de Devolução</th>
                <th>Status</th>
                <th>Nome do Colaborador</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan)
            <tr>
                <td>{{ $loan->id }}</td>
                <td>{{ Carbon\Carbon::parse($loan->loan_date)->format('d/m/Y') }}</td>
                <td>{{ Carbon\Carbon::parse($loan->expected_return_date)->format('d/m/Y') }}</td>
                <td>{{ $loan->status->description }}</td>
                <td>{{ $loan->collaborator->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
