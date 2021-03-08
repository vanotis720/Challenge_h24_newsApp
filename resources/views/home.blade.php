@extends('templates.app')

@section('content')
  
  <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark" style=" url('background-image: https://via.placeholder.com/200x250');">
    <div class="col-md-6 px-0">
      <h1 class="display-6 font-italic">Title of a longer featured blog post</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
    </div>
  </div>
  
  <div class="row mb-2">
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">World</strong>
          <h3 class="mb-0">Featured post</h3>
          <div class="mb-1 text-muted">Nov 12</div>
          <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <a href='{{ url("/articles/1") }}' class="stretched-link">Lire la suite</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="https://via.placeholder.com/200x250" class="card-img" alt="..." width="200" height="250" background="#55595c" color="#eceeef" text="Thumbnail">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Design</strong>
          <h3 class="mb-0">Post title</h3>
          <div class="mb-1 text-muted">Nov 11</div>
          <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <a href='{{ url("/articles/1") }}' class="stretched-link">Lire la suite</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="https://via.placeholder.com/200x250" class="card-img" alt="..." width="200" height="250" background="#55595c" color="#eceeef" text="Thumbnail">
        </div>
      </div>
    </div>
    
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">World</strong>
          <h3 class="mb-0">Featured post</h3>
          <div class="mb-1 text-muted">Nov 12</div>
          <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="stretched-link">Lire la suite</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="https://via.placeholder.com/200x250" class="card-img" alt="..." width="200" height="250" background="#55595c" color="#eceeef" text="Thumbnail">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Design</strong>
          <h3 class="mb-0">Post title</h3>
          <div class="mb-1 text-muted">Nov 11</div>
          <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="stretched-link">Lire la suite</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="https://via.placeholder.com/200x250" class="card-img" alt="..." width="200" height="250" background="#55595c" color="#eceeef" text="Thumbnail">
        </div>
      </div>
    </div>
    
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">World</strong>
          <h3 class="mb-0">Featured post</h3>
          <div class="mb-1 text-muted">Nov 12</div>
          <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="stretched-link">Lire la suite</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="https://via.placeholder.com/200x250" class="card-img" alt="..." width="200" height="250" background="#55595c" color="#eceeef" text="Thumbnail">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Design</strong>
          <h3 class="mb-0">Post title</h3>
          <div class="mb-1 text-muted">Nov 11</div>
          <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="stretched-link">Lire la suite</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="https://via.placeholder.com/200x250" class="card-img" alt="..." width="200" height="250" background="#55595c" color="#eceeef" text="Thumbnail">
        </div>
      </div>
    </div>
  </div>
  
@endsection
