@extends('layouts.app')

@section('title', 'Form Kriteria')

@section('content')
<form action="{{ isset($kriteria) ? route('kriteria.tambah.update', $kriteria->id) : route('kriteria.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label for="kriteria">Kriteria</label>
                        <input type="text" class="form-control" id="kriteria" name="kriteria" value="{{ isset($kriteria) ? $kriteria->kriteria : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="bobot">Bobot</label>
                        <input type="text" class="form-control" id="bobot" name="bobot" value="{{ isset($kriteria) ? $kriteria->bobot : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="tipe">Tipe</label>
                        <input type="text" class="form-control" id="tipe" name="tipe" value="{{ isset($kriteria) ? $kriteria->tipe : '' }}">
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