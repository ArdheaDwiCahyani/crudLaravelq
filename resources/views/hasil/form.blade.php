@extends('layouts.app')

@section('title', 'Form Hasil')

@section('content')
<form action="{{ isset($hasil) ? route('hasil.tambah.update', $hasil->id) : route('hasil.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label for="ranking">Ranking</label>
                        <input type="text" class="form-control" id="ranking" name="ranking" value="{{ isset($ranking) ? $ranking->ranking : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_kos">Nama Kos</label>
                        <input type="number" class="form-control" id="nama_kos" name="nama_kos" value="{{ isset($nama_kos) ? $nama_kos->nama_kos : '' }}">
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