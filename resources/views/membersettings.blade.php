@extends('layouts.master')
@section('title','Müşteri Paneli')
@section('content')

    <br>
    <br>

    <div class="row container-fluid align-self-center">
        <div class="col d-flex justify-content-center">

            <div class="card col-md-12">
                <br>
                <div class="card-header-pills text-right">
                    <a href="{{route('memberEdit')}}" class="btn btn-primary">Bilgilerinizi düzenleyin</a>
                </div>
                <br>
                <table class="table">
                    <thead class="thead">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Araç</th>
                        <th scope="col">Başlangıç Tarihi</th>
                        <th scope="col">Bitiş Tarihi</th>
                        <th scope="col">Ücret</th>
                        <th scope="col">Rezervasyon Durumu</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reservations as $key => $value)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$value->brand . ' ' .$value->model}}</td>
                            <td>{{$value->reservationStartDate}}</td>
                            <td>{{$value->reservationEndDate}}</td>
                            <td>{{$value->price}}</td>
                            @if($value->isConfirmed)
                            <td><img src="verified.png"> Onaylı </td>
                            @else
                                <td><img src="pending.png"> Beklemede </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    </div>



@endsection
