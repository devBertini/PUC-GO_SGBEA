@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Colaborador</h1>
    <form action="{{ route('collaborators.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Telefone:</label>
            <input type="text" class="form-control" name="phone" id="phone" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" name="status" id="status" required>
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="collaborator_type_id">Tipo de Colaborador:</label>
            <select class="form-control" name="collaborator_type_id" id="collaborator_type_id" required>
                @foreach ($collaboratorTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->description }}</option>
                @endforeach
            </select>
        </div>

        <!-- Adicione o campo OAB quando o tipo for Advogado -->
        <div class="form-group" id="oabField" style="display: none;">
            <label for="oab_number">Número da OAB:</label>
            <input type="text" class="form-control" name="oab_number" id="oab_number">
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            // Função para mostrar/ocultar o campo OAB com base no tipo de colaborador selecionado
            $(document).ready(function () {
                $('#collaborator_type_id').change(function () {
                    if ($(this).val() == 4) { // Se o tipo de colaborador for "Advogado"
                        $('#oabField').show();
                    } else {
                        $('#oabField').hide();
                    }
                });
            });
        </script>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>

@endsection
