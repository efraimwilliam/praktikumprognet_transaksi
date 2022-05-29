<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>{{ $title }}</title>
  </head>
  <body>
    <!-- menunya kita taruh persis di bawah <body> -->
    @include('layouts.menu')
    <!-- di bawah menu baru kontennya -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col col-lg-4 md-5 mt-5">
                <div class="card">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img src="{{ asset('img/avatar.png') }}" alt="profil" class="profile-user-img img-responsive img-circle-elevation-2">
                        </div>
                        <h3 class="profile-username text-center">{{ Auth::user()->user_name }}</h3>
                        <hr>
                        <strong>
                            <i class="fas fa-envelope mr-2"></i>
                            Email
                        </strong>
                        <p class="text-muted">
                            {{ Auth::user()->email }}
                        </p>
                        <hr>
                        <strong>
                            <i class="fas fa-map-marker mr-2"></i>
                            Alamat
                        </strong>
                        <p class="text-muted">
                            {{ Auth::user()->alamat }}
                        </p>
                        <hr>
                        <strong>
                            <i class="fas fa-phone mr-2"></i>
                            Telepon
                        </strong>
                        <p class="text-muted">
                            {{ Auth::user()->telepon }}
                        </p>
                    </div>
                </div>      
            </div>
        </div>
    </div>
    @include('layouts.footer')

  </body>
</html>