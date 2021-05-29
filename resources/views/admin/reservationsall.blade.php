@extends('admin.layouts.master')
@section('title','Rezervasyonlar')
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Rezervasyonlar</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Tüm Rezervasyonlar
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
                        @foreach($reservations as $item)
                            <tr>
                                <td>{{date('d-m-Y H:i:s', strtotime($item->reservationStartDate))}}</td>
                                <td>{{date('d-m-Y H:i:s', strtotime($item->reservationEndDate))}}</td>
                                <td>{{$item->brand}} {{$item->model}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->price}}</td>
                                @if(!$item->isConfirmed)
                                    <td><a href="{{route('backend.reservation',['id'=> $item->resid])}}">Onayla</a></td>
                                @else
                                    <td><img src="/verified.png"> Onaylı </td>
                                @endif
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


