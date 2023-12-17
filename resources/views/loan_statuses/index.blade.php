@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Status dos Empréstimos</h1>
    <a href="{{ route('loan_statuses.create') }}" class="btn btn-primary">Adicionar Status</a>
    <table class="table">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loanStatuses as $status)
            <tr>
                <td>{{ $status->description }}</td>
                <td>
                    <a href="{{ route('loan_statuses.edit', $status->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('loan_statuses.destroy', $status->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
