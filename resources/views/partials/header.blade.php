<nav class="navbar navbar-expand-md shadow-md custom-navbar">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-white" href="{{ route('admin.home') }}">
            <i class="fas fa-compass me-2"></i> Dashboard
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarAdmin" aria-controls="navbarAdmin" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="hamburger fas fa-bars fs-3"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarAdmin">
            <ul class="navbar-nav me-auto mb-2 mb-md-0 gap-2">
                <li class="nav-item">
                    <a href="{{ route('admin.travels.index') }}" class="nav-link">Viaggi</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}" class="nav-link">Categorie</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.tags.index') }}" class="nav-link">Tags</a>
                </li>
            </ul>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-light d-flex align-items-center gap-1">
                    <i class="fas fa-sign-out-alt"></i> <span class="d-none d-md-inline">Logout</span>
                </button>
            </form>
        </div>
    </div>
</nav>
