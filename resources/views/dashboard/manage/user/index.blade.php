@extends('dashboard.manage.layouts.main')
@section('container')
<!-- Simple Datatable start -->


<div class="card-box mb-30">
    <div class="pd-20" style="padding-bottom: 60px;">
        <h4 style="position: absolute;" class="text-blue h4">Data Pengguna</h4>
        <a href="/users/create">
            <p class="btn btn-primary float-right" >Tambah Pengguna</p>
        </a>
    </div>
        @if(session()->has('success'))
            <div class="alert alert-primary px-20" role="alert">
                <p>
                    {{ session('success') }}
                </p>
            </div>
        @endif

    <div class="pb-20" >
        <table  id="myTablse" class="table table-stripped">
            <thead>
                <tr>
                    <th width="10%"  class="table-plus datatable-nosort">Profile</th>
                    <th width="20%" >Nama</th>
                    <th width="15%" >Telepon</th>
                    <th width="30%" >Email</th>
                    <th width="10%" class="datatable-nosort">Action</th>
                </tr>
            </thead>

        </table>
    </div>
</div>
<!-- Modal Pengguna -->
<div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">
                <form action="/users" method="post" id="main_form">
                 {{-- <form action="{{ route('/users')" method="post" id="main_form"> --}}
                    @csrf
                <div class="modal-header">


                    <h4 class="modal-title" id="myLargeModalLabel">Pengguna Baru</h4>
                    <button type="button" id="modalClose" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Lengkasp</label>
                                <input autofocus name="name" class="form-control   @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" placeholder="Masukan Nama Lengkap" >
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>No Hp</label>
                                <input name="phone_number" class="form-control  @error('phone_number') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukan Noomer Handphone" type="number">
                                @error('phone_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukan alamat Email" type="email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label>Status</label>
                                <select name="status" class="form-control  @error('status') is-invalid @enderror">
                                    <option value="Akif" {{ (old("status") == "Aktif" ? "selected":"") }}>Aktif</option>
                                    <option value="Tidak Aktif" {{ (old("status") == "Tidak Aktif" ? "selected":"") }}>Tidak Aktif</option>


                                </select>
                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kata Sandi</label>
                                <input name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="***" type="password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                </div>
                <div class="modal-footer" >
                    <button type="button" id="modalClose" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
{{-- modal hapus --}}
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500">Are you sure you want to Delete this User?</h4>
                <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                    <div class="col-6">
                        <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" onclick="myClose()"><i class="fa fa-times"></i></button>
                        NO
                    </div>
                    <div class="col-6">
                        <form id="form_id" action="" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                                <button type="submit" class="btn btn-primary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-check"></i></button>
                                YES
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
        ajax: '{!! route('data') !!}',
        columns: [
            { data: 'image', name: 'image' },
            { data: 'name', name: 'name' },
            { data: 'phone_number', name: 'phone_number' },
            { data: 'email', name: 'email' },
            { data: 'action', name: 'action' }
        ]
    });
});

</script>
<script>
    function myFunction(name,job) {
        // document.getElementById("demo").innerHTML = "Welcome " + name + ", the " + job + ".";
        $("#myModal").modal('show');
        var action  = "/users/"+name;
        document.getElementById("form_id").action = action;
        console.log(name);
    }
    function myClose() {
        $("#myModal").modal('hide');
    }
</script>
@endsection
