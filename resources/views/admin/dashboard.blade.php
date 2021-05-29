@extends('admin.layouts.master')
@section('title','Dashboard')
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-header">Aktif Müşteri Sayısı</div>
                    <div class="card-body text-center">
                        <h3>{{$data['userCount']}}</h3>
                    </div>


                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{route('backend.userlist.page')}}">Detayları Görüntüle</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-header">Aktif Araç Sayısı</div>
                    <div class="card-body text-center">
                        <h3>{{$data['carCount']}}</h3>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{route('backend.carList')}}">Detayları görüntüle</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-header">Toplam Rezervasyon Sayısı</div>
                    <div class="card-body text-center">
                        <h3>{{$data['reservationsCount']}}</h3>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{route('backend.reservation.page')}}">Detayları görüntüle</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-header">Onay Bekleyen Rezarvasyon</div>
                    <div class="card-body text-center">
                        <h3>{{$data['pendingReservationsCount']}}</h3>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">

                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Onay bekleyen rezarvasyonlar
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table_1" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Rezarvasyon Başlangıç</th>
                            <th>Rezarvasyon Bitiş</th>
                            <th>Araç</th>
                            <th>Müşteri</th>
                            <th>Ücret</th>
                            <th>İşlem</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Rezarvasyon Başlangıç</th>
                            <th>Rezarvasyon Bitiş</th>
                            <th>Araç</th>
                            <th>Müşteri</th>
                            <th>Ücret</th>
                            <th>İşlem</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($pendingReservations as $item)
                        <tr>
                            <td>{{date('d-m-Y H:i:s', strtotime($item->reservationStartDate))}}</td>
                            <td>{{date('d-m-Y H:i:s', strtotime($item->reservationEndDate))}}</td>
                            <td>{{$item->brand}} {{$item->model}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->price}}</td>
                            <td><a href="{{route('backend.reservation',['id'=> $item->resid])}}">Onayla</a></td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $('#table_1').dataTable({
            "responsive": true,
            "dom": '<"html5buttons"B>lTfgitp',
            "language": {
                "emptyTable": "Gösterilecek ver yok.",
                "processing": "Veriler yükleniyor",
                "sDecimal": ".",
                "sInfo": "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                "sInfoFiltered": "(_MAX_ kayıt içerisinden bulunan)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "Sayfada _MENU_ kayıt göster",
                "sLoadingRecords": "Yükleniyor...",
                "sSearch": "Ara:",
                "sZeroRecords": "Eşleşen kayıt bulunamadı",
                "oPaginate": {
                    "sFirst": "İlk",
                    "sLast": "Son",
                    "sNext": "Sonraki",
                    "sPrevious": "Önceki"
                },
                "oAria": {
                    "sSortAscending": ": artan sütun sıralamasını aktifleştir",
                    "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
                },
                "select": {
                    "rows": {
                        "_": "%d kayıt seçildi",
                        "0": "",
                        "1": "1 kayıt seçildi"
                    }
                }
            }
        });
    </script>
@endsection


