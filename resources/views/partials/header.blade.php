<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-md">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('admin.home') }}">Dashboard</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarAdmin" aria-controls="navbarAdmin" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarAdmin">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                <button class="btn btn-outline-light">Logout</button>
            </form>
        </div>
    </div>
</nav>