<header class="header bg-dark text-white d-flex justify-content-between align-items-center">
    <div>
        <a class="navbar-brand" href="{{ url('/reports/loans') }}">
            <i class="bi bi-book-half" style="font-size: 1.5rem;"></i> 
            Sistema de Biblioteca
        </a>
    </div>
    
    <div class="ml-auto">
        @guest
            <a class="nav-link" href="{{ route('login') }}">Login</a>
        @else
            <a class="nav-link dropdown-toggle" href="#" role="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
                <br>
                <small>{{ Auth::user()->email }}</small>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <!-- Logout Option -->
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Sair
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        @endguest
    </div>
</header>
