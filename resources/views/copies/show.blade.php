@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Exemplar</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Livro: {{ $copy->book->title }}</h5>
            <p class="card-text">Status: {{ $copy->status->description }}</p>
            <!-- Outras informações do exemplar -->
        </div>
    </div>
</div>
@endsection
