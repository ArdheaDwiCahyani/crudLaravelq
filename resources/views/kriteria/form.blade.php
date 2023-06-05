@extends('layouts.app')

@section('title', 'Form Kriteria')

@section('content')
    <form action="{{ request()->routeIs('kriteria.edit') ? route('kriteria.tambah.update',['id'=>$kriteria->id]) : route('kriteria.tambah.simpan') }}"
        method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kriteria">Kriteria</label>
                            <input type="text" class="form-control" id="kriteria" name="kriteria"
                                value="{{ request()->routeIs('kriteria.edit') ? $kriteria->kriteria : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="bobot">Bobot</label>
                            <input type="text" class="form-control" id="bobot" name="bobot"
                                value="{{ request()->routeIs('kriteria.edit') ? $kriteria->bobot : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="tipe">Jenis Kos</label> <br>
                            <select class="form-control" name="tipe" wire:model="tipe">
                                {{-- <option value="{{ request()->routeIs('kriteria.edit') ? $kriteria->tipe : '' }}">{{ request()->routeIs('kriteria.edit') ? $kriteria->tipe : '' }}</option> --}}
                                
                                @if(request()->routeIs('kriteria.edit'))
                                <option
                                    @if ($kriteria->tipe == 'Cost' || old('tipe') == 'Cost')
                            selected 
                                    @endif value="Cost">Cost</option>
                                <option
                                    @if ($kriteria->tipe == 'Benefit' || old('tipe') == 'Benefit')
                                    selected
                                    @endif value="Benefit">Benefit</option>
                                    @else
                                    <option disabled selected>Pilih Jenis Kos</option>
                                    <option value="Cost">Cost</option>
                                    <option value="Benefit">Benefit</option>
                                    @endif
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
