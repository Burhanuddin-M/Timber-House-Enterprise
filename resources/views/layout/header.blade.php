<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand text-primary" href="#">
            <p>Timber House Enterprise</p>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="{{ route('showplates') }}">Documents</a>
                <a class="nav-link" href="{{ route('products.users') }}">Products</a>
                <a class="nav-link" href="{{ route('attendence.index') }}">Attendance</a>
                <a class="nav-link" href="{{ route('login') }}">Logout</a>
            </div>
        </div>
    </div>
</nav>
