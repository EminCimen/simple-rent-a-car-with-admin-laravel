@extends('admin.layouts.master')
@section('title','Yönetici Ekle')
@section('content')
    @php
        if($errors->any()){
                  alert()->error('Hata','Hata oluştu');
              }

    @endphp


    <div class="container-fluid">
        <h1 class="mt-4">Yönetici {{$admin? 'Düzenle' : 'Ekle'}}</h1>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user-cog"></i>
                Yönetici {{$admin? 'Düzenle' : 'Ekle'}}
            </div>
            <div class="card-body">
                <form action="{{$admin ? route('backend.adminUpdate') : route('backend.adminStore')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="{{$admin? $admin->email : "" }}"
                               placeholder="Email giriniz">
                    </div>
                    <div class="form-group">
                        <label>Şifre</label>
                        <input type="password" name="password" class="form-control" placeholder="Şifre giriniz">
                    </div>
                    <input type="hidden" name="id" class="form-control" value="{{$admin? $admin->id : ''}}">

                    <button type="submit" class="btn btn-primary">{{ $admin ? "Düzenle" : "Oluştur" }}</button>
                </form>
            </div>
        </div>
    </div>

@endsection
