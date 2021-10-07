<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">Ранобэ.онлайн</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Ранобэ</a>
          </li>
          
            <li class="nav-item">
              <a class="nav-link" href="#">Выбрать ранобэ</a>
            </li> 
            @auth()
            <li class="nav-item">
              <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            @endauth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Жанры
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          
        </ul>
        <form class="d-flex">
          <input class="form-control m-auto me-2" type="search" placeholder="Искать ранобэ" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Поиск</button>
        </form>
        <ul class="navbar-nav  mb-2 mb-lg-0">
          @auth()
            <li class="nav-item pl-5"><a href="{{ route('profile') }}" class="nav-link">{{ auth()->user()->name }}</a></li>
            <li class="nav-item">
              <form action=" {{ route('logout') }}" method="post" class="">
                @csrf
                <button type="submit" class="nav-link">Выйти</button>
                </form>
            </li>
          @endauth
          @guest
            <li class="nav-item pl-5"><a href="{{ route('login') }}" class="nav-link">Войти</a></li>
            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Регистрация</a></li>
          @endguest()
        </ul>
      </div>
    </div>
  </nav>