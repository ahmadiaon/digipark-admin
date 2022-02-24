@extends('dashboard.layouts.template')
@section('container')
<div class="card-box mb-30">

    <div class="pb-20" >
        <table  id="myTablse" class="table table-stripped">
            <thead>
                <tr>
                    <th width="20%">Nama</th>
                    <th width="5%">Umur</th>
                    <th width="20%">No HP</th>
                    <th width="10%">Instagram</th>
                    <th width="30%">Komunitas</th>
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
        ajax: '{!! route('community-registers-data') !!}',
        columns: [
            { data: 'nama', name: 'nama' },
            { data: 'age', name: 'age' },
            { data: 'phone_number', name: 'phone_number' },
            { data: 'instagram', name: 'instagram' },
            { data: 'name', name: 'name' },
            { data: 'action', name: 'action' }
        ]
    });
});

</script>
@endsection
