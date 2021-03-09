@extends('layouts.master')
@section('title','Bilgileri Düzenle')
@section('content')

    <!-- Jumbotron Header -->
    <br>
    <br>
    <!-- Page Features -->
    <div class="row container-fluid align-self-center">
        <div class="col d-flex justify-content-center">

            <div class="card col-md-8">
                <br>
                <br>
                <form action="{{route('memberStore')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>E-Posta</label>
                        <input type="email" name="email" class="form-control" value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label>Şifre</label>
                        <input type="password" name="password" class="form-control" placeholder="Şifreniz">
                    </div>
                    <div class="form-group">
                        <label>Adınız Soyadınız</label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label>TC Numaranız</label>
                        <input type="text" name="tc_no" class="form-control" value="{{$user->user_tc}}">
                    </div>
                    <div class="form-group">
                        <label>Telefon Numaranız</label>
                        <input type="text" name="telefon" class="form-control" value="{{$user->user_phone}}">
                    </div>

                    <br>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Düzenle</button>

                    </div>
                </form>



            </div>

        </div>



    </div>

    <!-- /.row -->


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection
