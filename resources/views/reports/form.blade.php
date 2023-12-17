@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gerar Relatórios</h1>
    <form action="{{ route('reports.generate') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="report_type">Tipo de Relatório:</label>
            <select class="form-control" name="report_type" id="report_type">
                <option value="loans">Empréstimos</option>
                <option value="reservations">Reservas</option>
                <!-- Outros tipos de relatórios -->
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Gerar Relatório</button>
    </form>
</div>
@endsection
