@extends('layouts.app')

@section('title', 'Form Edit Alternatif Kos')

@section('content')
<form action="{{ route('alternatif_kos.tambah.update', $alternatif_kos->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_kos">Nama Kos</label>
                        <input type="text" class="form-control" id="nama_kos" name="nama_kos" value="{{ isset($alternatif_kos) ? $alternatif_kos->nama_kos : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kos">Jenis Kos</label> <br>
                        <select class="form-control" name="jenis_kos">
                            <option selected disabled>--- Pilih Jenis Kos---</option>
                           
                            <option value="Putra" @if($alternatif_kos->jenis_kos == 'Putra') selected @endif>Putra</option>
                            <option value="Putri" @if($alternatif_kos->jenis_kos == 'Putri') selected @endif>Putri</option>
                            <option value="Bebas" @if($alternatif_kos->jenis_kos == 'Bebas') selected @endif>Bebas</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kriteria">Kriteria</label>
                        <select class="form-control" name="kriteria_id">
                            <option value="0">--- Pilih Kriteria ---</option>
                            @foreach ($data as $row)   
                            <option value="{{ $row->id }}"@if($alternatif_kos->kriteria_id == $row->id) selected @endif>{{ $row->kriteria }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sub_kriteria">Sub Kriteria</label>
                        <select class="form-control" name="sub_kriteria_id">
                            <option value="0">--- Pilih Sub Kriteria ---</option>
                            @foreach ($data as $row)   
                            <option value="{{ $row->id }}"@if($alternatif_kos->sub_kriteria_id == $row->id) selected @endif>{{ $row->sub_kriteria }}</option>
                            @endforeach
                        </select>
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