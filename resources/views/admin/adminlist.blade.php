@extends('admin.layouts.master')
@section('title','Yönetici Listesi')
@section('content')
    <div class="container-fluid">
        <br>
        <br>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Yöneticiler
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table_1" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Kullanıcı Adı</th>
                            <th width="150">İşlem</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Kullanıcı Adı</th>
                            <th width="150">İşlem</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($admins as $item)
                        <tr>
                            <td>{{$item->email}}</td>

                            <td><a href="{{route('backend.adminAdd',['id' => $item->id])}}" class="btn btn-success"> Düzenle</a> <a href="{{route('backend.adminDelete',['id' => $item->id])}}" class="btn btn-danger">Sil</a></td>
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
