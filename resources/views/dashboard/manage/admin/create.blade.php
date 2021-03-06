@extends('dashboard.manage.layouts.main')
@section('container')
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="">
            <h4 class="text-blue h4">Tambah Admin</h4>
            <p class="mb-30">Silahkan Lengkapi data dibawah ini</p>
            <form action="/admin" method="post" id="main_form">
                   @csrf
                   <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input autofocus name="name" class="form-control   @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" placeholder="Masukan Nama Lengkap" >
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>No Hp</label>
                    <input name="phone" class="form-control  @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Masukan Noomer Handphone" type="number">
                    @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Masukan alamat Email" type="email">
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
               <div class="modal-footer">
                   <a href="/admin/">
                        <button type="button" id="modalClose" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   </a>
                   <button type="submit" class="btn btn-primary">Save</button>
               </div>
           </form>
        </div>
    </div>
</div>
@endsection
