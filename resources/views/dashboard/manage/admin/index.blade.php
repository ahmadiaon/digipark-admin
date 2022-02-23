@extends('dashboard.manage.layouts.main')
@section('container')
<!-- Simple Datatable start -->


<div class="card-box mb-30">
    <div class="pd-20" style="padding-bottom: 60px;">
        <h4 style="position: absolute;" class="text-blue h4">Data Admin</h4>
        <a href="/admin/create">
            <p class="btn btn-primary float-right" >Tambah Admin</p>
        </a>
    </div>

    <div class="pb-20" >
        <table  id="myTablse" class="table table-stripped">
            <thead>
                <tr>
                    <th width="20%">Nama</th>
                    <th width="30%">Email</th>
                    <th width="20%">Telepon</th>
                    <th width="10%">Status</th>
                    <th width="12%">Aksi</th>
                </tr>
            </thead>

        </table>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

@if (count($errors) > 0)
    <script type="text/javascript">
        $( document ).ready(function() {
             $('#Medium-modal').modal('show');
        });
        $(function () {
        $('#modalClose').on('click', function () {
                $('#Medium-modal').modal('hide');
            })
        });
    </script>
  @endif
<script>
   $(function() {
    $('#myTablse').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('admin-data') !!}',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'phone', name: 'phone' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action' }
        ]
    });
});

</script>
@endsection
