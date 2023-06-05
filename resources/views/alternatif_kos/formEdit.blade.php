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
                        <label for="jenis_kos">Jenis Kos</label> <br>
                        <select class="form-control" name="jenis_kos">
                            <option hidden>Pilih Jenis Kos</option>
                            <option disabled="disabled" default="true">Pilih Jenis Kos</option>
                            <option @if (old('jenis_kos') == "Putra") selected @endif value="Putra">Putra</option>
                            <option @if (old('jenis_kos') == "Putri") selected @endif value="Putri">Putri</option>
                            <option @if (old('jenis_kos') == "Bebas") selected @endif  value="Bebas">Bebas</option>
                        </select>
                        @error('jenis_kos')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ isset($alternatif_kos) ? $alternatif_kos->alamat : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="pemilik">Pemilik</label> <br>
                        <select class="form-control" name="pemilik_id">
                            <option hidden>Pilih Pemilik Kos</option>
                            <option disabled="disabled" default="true">Pilih Pemilik Kos</option>
                            @foreach ($pemilik as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('pemilik')
                            {{ $message }}
                        @enderror
                    </div>
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