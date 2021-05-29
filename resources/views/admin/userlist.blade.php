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
                            <th>Adı</th>
                            <th>TC</th>
                            <th>Email</th>
                            <th>Telefon</th>
                            <th>Şehir</th>
                            <th>İşlem</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Adı</th>
                            <th>TC</th>
                            <th>Email</th>
                            <th>Telefon</th>
                            <th>Şehir</th>
                            <th>İşlem</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->user_tc}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->user_phone}}</td>
                                <td>{{$item->user_city}}</td>
                                <td><a href="{{route('backend.useredit.page',['id' => $item->id])}}">Düzenle</a></td>

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


