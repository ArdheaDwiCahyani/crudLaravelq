@extends('layouts.app')

@section('title', 'Form Sub Kriteria')

@section('content')
<form action="{{ isset($sub_kriteria) ? route('sub_kriteria.tambah.update', $sub_kriteria->id) : route('sub_kriteria.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label for="kriteria_id">Kriteria</label>
                        <select class="form-control" name="kriteria_id">
                            <option value="0">--- Pilih Kriteria ---</option>
                            <option value="1">Biaya</option>
                            <option value="2">Fasilitas</option>
                            <option value="3">Jarak</option>
                            <option value="4">Luas Kamar</option>
                            <option value="5">Keamanan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sub_kriteria">Sub Kriteria</label>
                        <input type="text" class="form-control" id="sub_kriteria" name="sub_kriteria" value="{{ isset($sub_kriteria) ? $sub_kriteria->sub_kriteria : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="bobot_sub">Bobot Sub</label>
                        <input type="number" class="form-control" id="bobot_sub" name="bobot_sub" value="{{ isset($sub_kriteria) ? $sub_kriteria->bobot_sub : '' }}">
                    </div>
                    {{-- <div class="form-group">
                        <label for="kriteria_id">ID Kriteria</label>
                        <input type="number" class="form-control" id="kriteria_id" name="kriteria_id" value="{{ isset($sub_kriteria) ? $sub_kriteria->kriteria_id : '' }}">
                    </div> --}}
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn tema-sidebar text-light">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    
</form>
@endsection