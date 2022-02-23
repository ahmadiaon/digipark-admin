@extends('dashboard.layouts.template')
@section('container')
<div class="card-box mb-30">
    <div class="pd-20" style="padding-bottom: 60px;">
        <h4 style="position: absolute;" class="text-blue h4">Data Wisata</h4>
        <a href="/tour/create">
            <p class="btn btn-primary float-right" >Tambah Wisata</p>
        </a>
    </div>
    <div class="pb-20" >
        <table  id="myTablse" class="table table-stripped">
            <thead>
                <tr>
                    <th width="20%">Nama</th>
                    <th width="20%">Aktif</th>
                    <th width="12%">Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection
@include('dashboard.layouts.javascript')
@section('javascripts')
<script>
   $(function() {
    $('#myTablse').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('tour-data') !!}',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action' }
        ]
    });
});

</script>
@endsection
