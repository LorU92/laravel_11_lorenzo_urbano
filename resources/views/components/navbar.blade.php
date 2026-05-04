<nav class="navbar navbar-custom navbar-expand-lg bg-body-tertiary mb-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{route('home.index')}}">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('article.index')}}">ARTICOLI</a>
        </li>

        @guest 
        <li class="nav-item">
          <a class="nav-link" href="{{route('register')}}">REGISTRATI</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">ACCEDI</a>
        </li>
        @endguest

        @auth  
        <li class="nav-item">
          <a class="nav-link" href="#">CIAO {{Auth::user()->name}}</a>
        </li>
                <li class="nav-item">
          <a class="nav-link" href="{{route('article.create')}}">CREA ARTICOLO</a>
        </li>  
        <li class="nav-item">
            {{-- tag può fare rotte di solo get --}}
            {{-- tag form può fare rotte post --}}
          <form 
          action="{{route('logout')}}"
          method="POST">
            <button type="submit" class="nav-link" >LOGOUT</button>
          </form>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>