@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $lawArea->description }}</h1>
        <a href="{{ route('law_areas.index') }}" class="btn btn-primary">Voltar</a>
        <a href="{{ route('law_areas.edit', $lawArea->id) }}" class="btn btn-warning">Editar</a>
    </div>
@endsection