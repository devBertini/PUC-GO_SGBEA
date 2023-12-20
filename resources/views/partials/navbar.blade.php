<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('books.index') }}">Livros</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('copies.index') }}">Exemplares</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('publishers.index') }}">Editoras</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('authors.index') }}">Autores</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('law_areas.index') }}">Áreas de Advocacia</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('collaborators.index') }}">Colaboradores</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('loans.index') }}">Empréstimos</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('reservations.index') }}">Reservas</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Usuários</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('reports.loans') }}">Relatórios</a></li>
        </ul>
    </div>
</nav>
