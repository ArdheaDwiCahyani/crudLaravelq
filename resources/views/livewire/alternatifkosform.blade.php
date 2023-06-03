<div>
    <form wire:submit.prevent='store'>
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_kos">Nama Kos</label>
                            <input wire:model="nama_kos" type="text" class="form-control" id="nama_kos" name="nama_kos" value="{{ old('nama_kos') }}">
                            @error('nama_kos')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenis_kos">Jenis Kos</label> <br>
                            <select class="form-control" name="jenis_kos" wire:model="jenis_kos">
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
                        {{-- <div class="form-group">
                            <label for="kriteria_id">Kriteria</label>
                            <select class="form-control" name="kriteria_id" id="kriteria_id">
                                <option value="0">--- Pilih Kriteria ---</option>
                                @foreach ($data_kriteria as $row)   
                                    <option 
                                    value="{{ $row->id }}">{{ $row->kriteria }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sub_kriteria_id">Sub Kriteria</label>
                            <select class="form-control" name="sub_kriteria_id" id="sub_kriteria_id">
                                <option value="0">--- Pilih Sub Kriteria ---</option>
                            </select>
                        </div> --}}
                        @foreach ($data_kriteria as $kriteria)
                        <div class="form-group">
                            <label for="sub_kriteria_id">{{ $kriteria['kriteria']->kriteria }}</label>
                            <select class="form-control" name="sub_kriteria_id" id="sub_kriteria_id" wire:model="krit_and_sub.{{ $kriteria['kriteria']->id }}" wire:key="krit_and_sub.{{ $kriteria['kriteria']->id }}">
                                <option hidden>Pilih Sub Kriteria</option>
                                <option disabled="disabled" default="true">Pilih Sub Kriteria</option>
                            @foreach ($kriteria['sub_kriteria'] as $sub)
                                <option value="{{ $sub->id }}">{{ $sub->sub_kriteria }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn tema-sidebar text-light">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        
    </form>
</div>
