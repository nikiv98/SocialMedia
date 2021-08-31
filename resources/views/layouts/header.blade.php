<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/index">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/posts/publish">Publish</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contacts">Contact us</a>
        </li>
      </ul>
      <ul class="nav justify-content-end">
        @guest
            <a class="nav-link navbar-text" href="{{ route('login') }}">{{ __('Login') }}</a>
            @if (Route::has('register'))
                <a class="nav-link navbar-text" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
            @else
              <span>{{ Auth::user()->name }}</span>

              <a href="{{ route('logout') }}"
                class="nav-link navbar-text"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
              </form>
         @endguest
      </ul>
    </div>
  </nav>