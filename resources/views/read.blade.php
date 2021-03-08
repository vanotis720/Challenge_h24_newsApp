@extends('templates.app')

@section('content')
  
  
<main role="main" class="container">
    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-5 font-italic">{{ $article->title ?? '' }}</h1>
        </div>
      </div>
  
  <div class="row">
    <div class="col-md-12 blog-main">
        <h4 class="pb-4 mb-4 font-italic border-bottom">
           Categorie: {{ $article->categorie ?? '' }}
        </h4>
        <!--@if($errors->any())-->
        <!--    {!! implode('', $errors->all('<div>:message</div>')) !!}-->
        <!--@endif-->
        @if(session('message'))
            <div class="alert alert-info text-center alert-dismissible fade show" alt="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

      <div class="blog-post">
        <h2 class="blog-post-title">{{ $article->title ?? '' }}</h2>
        <p class="blog-post-meta">{{ $article->created_at ?? '' }} par <a href="#">{{ $article->username ?? '' }}</a></p>
        
        <p>
            {{ $article->content ?? '' }}
        </p>
        <hr>
        <h4 class="pb-4 mb-4 font-italic border-bottom">
           {{ count($commentaires) }} Commentaires
        </h4>
        
        @if($commentaires->isNotEmpty())
            @foreach($commentaires as $commentaire)
                <h5 class="display-8 font-italic">{{ $commentaire->username }}</h5>
                <p>
                    {{ $commentaire->comment }}
                </p>
                <p class="blog-post-meta">{{ $commentaire->created_at ?? '' }}</p>
            @endforeach
        @else
            <div class="alert alert-info">Il y a pas des commentaires sur cet article pour l'instant</div>
        @endif
        
        <hr>
        <h4 class="pb-4 font-italic border-bottom">
           Laissez un commentaire
           <br>
           <form class="form" method="POST" action="{{ route('comments.post') }}">
               @csrf
                <input type="text" name="articles_id" value="{{ $article->id }}" hidden>
                <input type="text" name="users_id" value="{{ Auth::user()->id }}" hidden>
                <div class="form-group">
                    <textarea name="comment" class="form-control" rows="3"></textarea>
                </div>
                 <button type="submit" class="btn btn-primary">Poster votre commentaire</button>
            </form>
        </h4>
        
        
      </div><!-- /.blog-post -->

    </div><!-- /.blog-main -->

  </div><!-- /.row -->

</main><!-- /.container -->
  
@endsection
