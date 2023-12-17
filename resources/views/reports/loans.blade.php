@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Relatório de Empréstimos</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Exemplar</th>
                <th>Colaborador</th>
                <th>Data do Empréstimo</th>
                <th>Data Prevista de Devolução</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan)
            <tr>
                <td>{{ $loan->copy->book->title }}</td>
                <td>{{ $loan->collaborator->name }}</td>
                <td>{{ $loan->loan_date }}</td>
                <td>{{ $loan->expected_return_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
