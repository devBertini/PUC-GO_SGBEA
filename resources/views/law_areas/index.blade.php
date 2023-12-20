@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Áreas de Advocacia</h1>
    <a href="{{ route('law_areas.create') }}" class="btn btn-primary">Adicionar Áreas de Advocacia</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lawAreas as $lawArea)
            <tr>
                <td>{{ $lawArea->description }}</td>
                <td>
                    <a href="{{ route('law_areas.show', $lawArea->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('law_areas.edit', $lawArea->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('law_areas.destroy', $lawArea->id) }}" method="POST" style="display:inline;">
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
