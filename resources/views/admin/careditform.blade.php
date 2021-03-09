@extends('admin.layouts.master')
@section('title','Araç Düzenle')
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Araç Düzenle</h1>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-car mr-1"></i>
                Araç Düzenle
            </div>
            <div class="card-body">
                <form action="{{route('backend.carUpdate')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label>Yüklü Görsel</label>
                    <div class="form-group">

                        <img src="/images/{{$car->image}}" width="150">
                    </div>
                    <div class="form-group">
                        <label>Marka</label>
                        <input type="text" name="brand" class="form-control" value="{{$car->brand}}" placeholder="Aracın Markasını Giriniz">
                    </div>
                    <div class="form-group">
                        <label>Model</label>
                        <input type="text" name="model" class="form-control" value="{{$car->model}}" placeholder="Aracın Modelini Giriniz">
                    </div>
                    <div class="form-group">
                        <label>Detay</label>
                        <textarea name="detail" class="form-control" placeholder="Aracın Açıklamasını Giriniz">{{$car->details}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Koltuk Sayısı Giriniz</label>
                        <input type="number" name="seats" class="form-control" value="{{$car->seats}}">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="automatic" {{$car->isAutomatic ? 'checked' : ''}}>
                        <label class="form-check-label" >Otomatik vites</label>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="diesel" {{$car->isDiesel ? 'checked' : ''}}>
                        <label class="form-check-label">Dizel</label>
                    </div>
                    <div class="form-group">
                        <label>Günlük Fiyat</label>
                        <input type="number" name="dailyprice" class="form-control" value="{{$car->dailyPrice}}">
                    </div>
                    <div class="form-group">
                        <label>Görsel yükleyiniz</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                    <input name="carid" type="hidden" value="{{$car->id}}">
                    <button type="submit" class="btn btn-primary">Düzenle</button>
                </form>
            </div>
        </div>
    </div>

@endsection
