@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Exemplares</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Livro</th>
                <th>Status</th>
                <th>Localização</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($copies as $copy)
            <tr>
                <td>{{ $copy->book->title }}</td>
                <td>{{ $copy->status->description }}</td>
                <td>{{ $copy->location }}</td>
                <td>
                    <a href="{{ route('copies.show', $copy->id) }}" class="btn btn-info">Ver</a>
                    <!-- Outras ações -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
