@extends('admin.layouts.master')
@section('title','Üye Düzenle')
@section('content')
    @php
        if($errors->any()){
                  alert()->error('Hata','Hata oluştu');
              }

    @endphp
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container-fluid">
        <h1 class="mt-4">Üye Düzenle</h1>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user-cog"></i>
               Üye Düzenle
            </div>
            <div class="card-body">
                <form action="{{route('backend.userupdate',['id' => $user->id])}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Adı</label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}"
                               >
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="{{$user->email}}"
                               >
                    </div>
                    <div class="form-group">
                        <label>TC No</label>
                        <input type="text" name="user_tc" class="form-control" value="{{$user->user_tc}}"
                               >
                    </div>
                    <div class="form-group">
                        <label>Telefon</label>
                        <input type="text" name="user_phone" class="form-control" value="{{$user->user_phone}}"
                               >
                    </div>
                    <div class="form-group">
                        <label>Şehir</label>
                        <input type="text" name="user_city" class="form-control" value="{{$user->user_city}}"
                               >
                    </div>
                    <div class="form-group">
                        <label>Doğum Yılı</label>
                        <input type="text" name="user_birthday" class="form-control" value="{{$user->user_birthday}}">
                    </div>


                    <button type="submit" class="btn btn-primary">Düzenle</button>
                </form>
            </div>
        </div>
    </div>

@endsection
