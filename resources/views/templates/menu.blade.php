<div class="container">
    
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-3 pt-1">
                @auth
                    <a class="btn btn-sm btn-outline-success" href="{{ route('article') }}">Publier un article</a>
                @endauth
            </div>
            <div class="col-5 text-center">
                <a class="blog-header-logo text-dark" href="/">NewsapP</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <!--<a class="text-muted" href="/">-->
                <!--  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>-->
                <!--</a>-->
                @auth
                    <a class="btn btn-sm btn-outline-info" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Me deconnecter</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    <a class="btn btn-sm btn-outline-danger" href="{{ route('login') }}">Me connecter</a>
                @endauth
            </div>
        </div>
      </header>
    
      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          @foreach($categories as $cat)
            <a class="p-2 text-muted" href='{{ url("/articles/categories/$cat->id") }}'>{{ $cat->title }}</a>
          @endforeach
        </nav>
      </div>

