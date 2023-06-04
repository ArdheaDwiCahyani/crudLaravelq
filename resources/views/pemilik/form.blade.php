@extends('layouts.app')

@section('title', 'Form Pemilik')

@section('content')
<form action="{{ isset($pemilik) ? route('pemilik.tambah.update', $pemilik->id) : route('pemilik.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ isset($admin) ? $admin->nama : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin">
                            <option value="-">--- Pilih Jenis Kelamin ---</option>
                            <option value="Laki-laki"{{ $admin->jenis_kelamin == "Laki-laki" ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan"{{ $admin->jenis_kelamin == "Perempuan" ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No. Telp</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ isset($admin) ? $admin->no_telp : '' }}">
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