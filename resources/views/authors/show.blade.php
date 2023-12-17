@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Autor</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $author->name }}</h5>
            <!-- Outras informações do autor -->
        </div>
    </div>
</div>
@endsection
