<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}">Mi Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('articles.create')}}">Nuevo Articulo</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{auth()->user()->name ?? 'Usuario'}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @guest
              <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
              <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
            @endguest

            @auth
            <li><a class="dropdown-item" href="#" id="logout_link">Logout</a></li>
            <form action="{{route('logout')}}" method="POST" id="logout_form">
                @csrf
            </form>
            @endauth
              {{-- <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
            </ul>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>