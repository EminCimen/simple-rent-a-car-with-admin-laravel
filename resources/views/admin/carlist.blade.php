@extends('admin.layouts.master')
@section('title','Araç Listesi')
@section('content')
    <div class="container-fluid">
        <br>
        <br>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Araçlar
                <a href="{{route('backend.deletedCarList')}}" class="btn btn-danger float-lg-right">Silinen araçlar</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table_1" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Görsel</th>
                            <th width="100">Marka</th>
                            <th width="100">Model</th>
                            <th width="300">Detay</th>
                            <th width="30">Koltuk</th>
                            <th>Vites</th>
                            <th width="100">Yakıt Tipi</th>
                            <th width="100">Günlük Fiyat</th>
                            <th>İşlem</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Görsel</th>
                            <th width="100">Marka</th>
                            <th width="100">Model</th>
                            <th width="300">Detay</th>
                            <th width="30">Koltuk</th>
                            <th>Vites</th>
                            <th width="100">Yakıt Tipi</th>
                            <th width="100">Günlük Fiyat</th>
                            <th>İşlem</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($data['cars'] as $item)
                        <tr>
                            <td><img src="/images/{{$item->image}}" width="50"></td>
                            <td>{{$item->brand}}</td>
                            <td>{{$item->model}}</td>
                            <td>{{$item->details}}</td>
                            <td>{{$item->seats}}</td>
                            <td>{{$item->isAutomatic==1 ? "Otomatik" : "Manuel"}}</td>
                            <td>{{$item->isDiesel==1 ? "Dizel" : "Benzinli"}}</td>
                            <td>{{$item->dailyPrice}}</td>
                            <td><a href="{{route('backend.carEdit',['id' => $item->id])}}" class="btn btn-success"> Düzenle</a> <a href="{{route('backend.carPassive',['id' => $item->id])}}" class="btn btn-danger">Sil</a></td>
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
