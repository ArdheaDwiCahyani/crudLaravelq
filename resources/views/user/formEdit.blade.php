@extends('layouts.app')

@section('title', 'Form User')

@section('content')
<form action="{{ route('user.tambah.update', $user->id) }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ isset($user) ? $user->username : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ isset($user) ? $user->email : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="password" name="password" value="{{ isset($user) ? $user->password : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ isset($user) ? $user->nama : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin">
                            <option value="-">--- Pilih Jenis Kelamin ---</option>
                            <option value="Laki-laki"{{ $user->jenis_kelamin == "Laki-laki" ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan"{{ $user->jenis_kelamin == "Perempuan" ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No. Telp</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ isset($user) ? $user->no_telp : '' }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn tema-sidebar text-light">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    
</form>

@endsection