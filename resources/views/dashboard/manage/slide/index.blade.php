@extends('dashboard.layouts.template')
@section('container')
<div class="card-box mb-30">
    <div class="pd-20" style="padding-bottom: 60px;">
        <h4 style="position: absolute;" class="text-blue h4">Data Slide</h4>
        <a href="/slide/create">
            <p class="btn btn-primary float-right" >Tambah Slide</p>
        </a>
    </div>
    <div class="pb-20" >
        <table  id="myTablse" class="table table-stripped">
            <thead>
                <tr>
                    <th width="20%">Gambar</th>
                    <th width="30%">Judul</th>
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
        ajax: '{!! route('slide-data') !!}',
        columns: [
            { data: 'image', name: 'image' },
            { data: 'title', name: 'title' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action' }
        ]
    });
});

</script>
@endsection
