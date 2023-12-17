@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bem-vindo ao Sistema de Biblioteca</h1>
    <p><a href="{{ route('login') }}">Login</a> | <a href="{{ route('register') }}">Registrar</a></p>
</div>
@endsection
