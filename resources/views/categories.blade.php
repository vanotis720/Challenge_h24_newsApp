@extends('templates.app')

@section('content')
  
    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark" style=" url('background-image: https://via.placeholder.com/200x250');">
        <div class="col-md-6 px-0">
            <h1 class="display-6 font-italic">Dans la categorie {{ $this_categorie->title }}</h1>
        </div>
    </div>
     
    <div class="row mb-2">
        @if($articles->isNotEmpty())
            @foreach($articles as $article)
                <div class="col-sm-6">
                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-100 position-relative">
                        <div class="col-sm-7 p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary">{{ $article->categorie }}</strong>
                            <h3 class="mb-0">{{ $article->title }}</h3>
                            <div class="mb-1 text-muted">{{ $article->created_at }}</div>
                            <p class="card-text mb-auto">{{ substr($article->content,0,50) }}</p>
                            <a href='{{ url("/articles/$article->id") }}' class="stretched-link">Lire la suite</a>
                        </div>
                        <div class="col-sm-5">
                            <img src='{{ asset('/storage/' . $article->picture) }}' class="card-img" height="220" alt="img" background="#55595c" color="#eceeef" text="Thumbnail">
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-12">
                <div class="alert alert-info">Il y a pas d'articles pour l'instant</div>
            </div>
        @endif
    </div>
  
@endsection
