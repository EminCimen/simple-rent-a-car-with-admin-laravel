@extends('layouts.master')
@section('title','Tüm araçlar')
@section('content')

    <!-- Jumbotron Header -->

    <br>
    <br>
    <div class="row text-center">
        <div class="col md-2">
            {{ $cars->links() }}
        </div>
    </div>
    <br>
    <!-- Page Features -->
    <div class="row text-center">
        @foreach($cars as $item)
            <div class="col-lg-3 col-md-6 mb-4 h-250">
                <div class="card h-200" style="height:600px">
                    <img class="card-img-top" src="/images/{{$item->image}}" alt="">
                    <div class="card-body">
                        <h4 class="card-title">{{$item->brand .' '. $item->model}}</h4>
                        <p class="card-text">{{$item->details}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><img src="/car-seat.png"> {{$item->seats}} Koltuk</li>
                        <li class="list-group-item"><img src="/gear-stick.png"
                                                         width="24"> {{$item->isAutomatic ? ' Otomatik' : ' Manuel'}}
                            Vites
                        </li>
                        <li class="list-group-item"><img src="/fuel.png"> {{$item->isDiesel ? ' Dizel' : 'Benzin'}}</li>
                        <li class="list-group-item"><img src="/price-tag.png"> {{$item->dailyPrice }} TL/gün</li>
                    </ul>
                    <div class="card-footer">
                        <a href="{{route('rent',['id' => $item->id])}}" class="btn btn-primary">Hemen kirala!</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <div class="row text-center">
        <div class="col md-2">
            {{ $cars->links() }}
        </div>
    </div>
    <br>
    <br>


@endsection
