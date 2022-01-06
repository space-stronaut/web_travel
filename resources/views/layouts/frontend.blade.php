<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TravelTera</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="#">Travel<span class="text-primary">Tera</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('paket.index') }}">Paket</a>
              </li>
              @guest
              <li class="nav-item">
                  <a href="{{ route('login') }}" class=" btn btn-primary">Login</a>
              </li>
              @endguest
              @auth
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a href="{{ route('profile.index') }}" class="dropdown-item">Profile</a>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
              @endauth
            </ul>
          </div>
        </div>
      </nav>

      @yield('content')

      {{-- footer --}}
      <footer class="bd-footer py-5 mt-5 bg-light">
        <div class="container py-5">
          <div class="row">
            <div class="col-lg-3 mb-3">
              <a class="d-inline-flex align-items-center mb-2 link-dark text-decoration-none" href="/" aria-label="Bootstrap">
                {{-- {{ partial "icons/bootstrap-white-fill.svg" (dict "class" "d-block me-2" "width" "40" "height" "32") }} --}}
                <span class="fs-5">Travel<span class="text-primary">Tera</span></span>
              </a>
            </div>
            <div class="col-6 col-lg-2 offset-lg-1 mb-3">
              <h5>Links</h5>
              <ul class="list-unstyled">
                <li class="mb-2"><a href="/">Home</a></li>
                <li class="mb-2"><a href="/docs//">Docs</a></li>
                <li class="mb-2"><a href="/docs//examples/">Examples</a></li>
                <li class="mb-2"><a href="">Themes</a></li>
                <li class="mb-2"><a href="">Blog</a></li>
              </ul>
            </div>
            <div class="col-6 col-lg-2 mb-3">
              <h5>Guides</h5>
              <ul class="list-unstyled">
                <li class="mb-2"><a href="/docs//getting-started/">Getting started</a></li>
                <li class="mb-2"><a href="/docs//examples/starter-template/">Starter template</a></li>
                <li class="mb-2"><a href="/docs//getting-started/webpack/">Webpack</a></li>
                <li class="mb-2"><a href="/docs//getting-started/parcel/">Parcel</a></li>
              </ul>
            </div>
            <div class="col-6 col-lg-2 mb-3">
              <h5>Projects</h5>
              <ul class="list-unstyled">
                <li class="mb-2"><a href="/bootstrap">Bootstrap 5</a></li>
                <li class="mb-2"><a href="/bootstrap/tree/v4-dev">Bootstrap 4</a></li>
                <li class="mb-2"><a href="/icons">Icons</a></li>
                <li class="mb-2"><a href="/rfs">RFS</a></li>
                <li class="mb-2"><a href="/bootstrap-npm-starter">npm starter</a></li>
              </ul>
            </div>
            <div class="col-6 col-lg-2 mb-3">
              <h5>Community</h5>
              <ul class="list-unstyled">
                <li class="mb-2"><a href="/bootstrap/issues">Issues</a></li>
                <li class="mb-2"><a href="/bootstrap/discussions">Discussions</a></li>
                <li class="mb-2"><a href="https://github.com/sponsors/twbs">Corporate sponsors</a></li>
                <li class="mb-2"><a href="">Open Collective</a></li>
                <li class="mb-2"><a href="">Slack</a></li>
                <li class="mb-2"><a href="https://stackoverflow.com/questions/tagged/bootstrap-5">Stack Overflow</a></li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
      

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>