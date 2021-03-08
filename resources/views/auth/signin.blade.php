<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
      <title>NewsApp - partages et lis les dernieres nouvells pret de chez toi</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- Custom fonts -->
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:700,900' rel='stylesheet' type='text/css'>

    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
</head>
<body class="text-center" cz-shortcut-listen="true">
    @if (session('msg'))
        <div class="alert alert-primary" role="alert">
            <strong>{{ session('msg') }}</strong>
        </div>
    @endif
            <form class="form-signin" method="POST" action="{{ route('register.post') }}">
                @csrf
                <img class="mb-4" src="{{ asset('bootstrap-solid.svg') }}" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Entrez vos informations</h1>
                
                <label for="inputEmail" class="sr-only">Nom d'utilisateur</label>
                <input type="text" id="inputEmail" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" placeholder="Username" required autofocus>
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <label for="inputEmail" class="sr-only">Addresse Email</label>
                <input type="email" id="inputEmail" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Addresse Email" required autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <label for="inputPassword" class="sr-only">Mot de passe</label>
                <input type="password" id="inputPassword" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="Mot de passe" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <div class="checkbox mb-3">
                    <label>
                        <a href="{{ route('login') }}">J'ai deja un compte</a>
                    </label>
                    </div>
                  <button class="btn btn-lg btn-primary btn-block" type="submit">M'inscrire</button>
                  <p class="mt-5 mb-3 text-muted">&copy; 2020-{{ date('Y') }}</p>
            </form>
</body>
</html>