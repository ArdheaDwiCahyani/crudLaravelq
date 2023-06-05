@extends('layouts.app')

@section('title', 'Form Kriteria')

@section('content')
    <form action="{{ isset($kriteria) ? route('kriteria.tambah.update', $kriteria->id) : route('kriteria.tambah.simpan') }}"
        method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kriteria">Kriteria</label>
                            <input type="text" class="form-control" id="kriteria" name="kriteria"
                                value="{{ isset($kriteria) ? $kriteria->kriteria : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="bobot">Bobot</label>
                            <input type="text" class="form-control" id="bobot" name="bobot"
                                value="{{ isset($kriteria) ? $kriteria->bobot : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="tipe">Jenis Kos</label> <br>
                            <select class="form-control" name="tipe" wire:model="tipe">
                                <option hidden>Pilih Jenis Kos</option>
                                <option disabled="disabled" default="true">Pilih Jenis Kos</option>
                                <option
                                    @if ($kriteria) @if ($kriteria->tipe == 'Cost' || old('tipe') == 'Cost')
                            selected @endif
                                    @endif value="Cost">Cost</option>
                                <option
                                    @if ($kriteria) @if ($kriteria->tipe == 'Benefit' || old('tipe') == 'Benefit')
                                    selected @endif
                                    @endif value="Benefit">Benefit</option>
                            </select>
                            @error('tipe')
                                {{ $message }}
                            @enderror
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
