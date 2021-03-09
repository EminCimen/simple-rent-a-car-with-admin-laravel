@extends('layouts.master')
@section('title','Giriş Yap')
@section('content')

    <!-- Jumbotron Header -->
<br>
    <br>
    <!-- Page Features -->
    <div class="row container-fluid align-self-center">
        <div class="col d-flex justify-content-center">

        <div class="card col-md-8">
            <br>
            <a href="{{route('register')}}" class="btn btn-warning">Üye değilseniz, hemen üye olun!</a>
            <br>
        <form action="{{route('loginAttempt')}}" method="post">
            @csrf
            <div class="form-group">
                <label>E-Posta</label>
                <input type="email" name="email" class="form-control" placeholder="E-Posta Adresiniz">

            </div>
            <div class="form-group">
                <label>Şifre</label>
                <input type="password" name="password" class="form-control" placeholder="Şifreniz">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="rememberme" class="form-check-input" >
                <label class="form-check-label">Beni hatırla</label>
            </div>
            <div class="form-group text-right">
            <button type="submit" class="btn btn-primary">Giriş yap</button>

            </div>

            <br>
        </form>
        </div>
        </div>






    </div>
    <br>
    <br>
    <!-- /.row -->


@endsection
