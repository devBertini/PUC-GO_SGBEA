@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listagem de Empréstimos</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cópia</th>
                    <th>Colaborador</th>
                    <th>Data do Empréstimo</th>
                    <th>Data de Devolução Esperada</th>
                    <th>Status</th>
                    <th>Multa</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                    <tr>
                        <td>{{ $loan->id }}</td>
                        <td>{{ $loan->copy->book->title }}</td>
                        <td>{{ $loan->collaborator->name }}</td>
                        <td>{{ Carbon\Carbon::parse($loan->loan_date)->format('d/m/Y') }}</td>
                        <td>{{ Carbon\Carbon::parse($loan->expected_return_date)->format('d/m/Y') }}</td>
                        <td>{{ $loan->status->description }}</td>
                        <td>R${{ $loan->fine ? : '0,00' }}</td>
                        <td>
                            <a href="{{ route('loans.show', $loan->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('loans.edit', $loan->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('loans.create') }}" class="btn btn-success">Criar Novo Empréstimo</a>
    </div>
@endsection
