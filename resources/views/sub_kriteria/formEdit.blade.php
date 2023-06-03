@extends('layouts.app')

@section('title', 'Form Edit Sub Kriteria')

@section('content')
<form action="{{ route('sub_kriteria.tambah.update', $sub_kriteria->id) }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label for="kriteria_id">Kriteria </label>
                        <select class="form-control" name="kriteria_id">
                            {{-- <option value="0">--- Pilih Kriteria ---</option> --}}
                            <option value="1" {{ $sub_kriteria->kriteria_id == "1" ? 'selected' : '' }}>Biaya</option>
                            <option value="2" {{ $sub_kriteria->kriteria_id == "2" ? 'selected' : '' }}>Fasilitas</option>
                            <option value="3" {{ $sub_kriteria->kriteria_id == "3" ? 'selected' : '' }}>Jarak</option>
                            <option value="4" {{ $sub_kriteria->kriteria_id == "4" ? 'selected' : '' }}>Luas Kamar</option>
                            <option value="5" {{ $sub_kriteria->kriteria_id == "5" ? 'selected' : '' }}>Keamanan</option>
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
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn tema-sidebar text-light">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    
</form>

@endsection