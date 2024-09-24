<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>@yield('title')</title>
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
          <a class="navbar-brand" href="#">Travelmania</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a @class(['nav-link', 'active' => request()->route()->getName() === 'voyage.index' ]) aria-current="page" href="{{route('voyage.index')}}">Liste des voyages</a>
                  </li>
              </ul>
              <div class="d-flex align-items-center">
                @auth
                  <em class="text-white">Bonjour {{ \Illuminate\Support\Facades\Auth::user()->name }}</em>
                  <form class="nav-item" action="{{ route('auth.logout') }}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-outline-light ms-4">Se deconnecter</button>
                  </form>
                @endauth
                @guest
                  <a class="btn btn-outline-light me-2" href="{{ route('login') }}">Se connecter</a>
                @endguest
              </div>
          </div>
      </div>
  </nav>

  <!-- Header Section -->
  <header class="header-section">
      <h1>Bienvenue sur Travelmania</h1>
  </header>

  <!-- Main Content -->
  <div class="container">
      @if (session('success'))
          <div class="alert alert-success mt-4">
              {{ session('success') }}
          </div>
      @endif

      <!-- Dynamic content -->
      @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoPZO5smQOMHOASw1G2Fz2Xt+7Ka7sF6r62gS8pmd58vFZC" crossorigin="anonymous"></script>
</body>
</html>