@extends('templates.app')

@section('content')
  
    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark" style=" url('background-image: https://via.placeholder.com/200x250');">
        <div class="col-md-6 px-0">
            <h2 class="display-8 font-italic">Partager des nouvelles avec vos proches</h2>
        </div>
    </div>
    <div class="row mb-2 justify-content-center">
        <div class="col-sm-8">
            <form class="form" method="POST" action="{{ route('article.post') }}" enctype="multipart/form-data">
                @csrf
                <input type="text" name="users_id" value="{{ Auth::user()->id }}" hidden>
                <div class="control-group">
                    <div class="form-group">
                        <label>Titre</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Donner un titre a l'article" required>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group col-xs-12 controls">
                        <select class="form-control @error('categories_id') is-invalid @enderror" name="categories_id" required>
                            <option disabled selected>Selectionner une categorie</option>
                            @foreach($catego as $categorie)
                                <option value="{{ $categorie->id }}" @if($categorie->id = old('categories_id') ) selected @endif>{{ $categorie->title }}</option>
                            @endforeach
                        </select>
                        @error('categories_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group col-xs-12 controls">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Choisir une image de couverture</label>
                            <input class="form-control" type="file" name="picture" id="formFile" value="{{ old('picture') }}" required>
                            @error('picture')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group col-xs-12 controls">
                        <textarea name="content" class="form-control" rows="3" value="{{ old('content') }}" placeholder="ecrivez votre message ici"></textarea>
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Publier</button>
            </form>
        </div>
    </div>
  
@endsection
