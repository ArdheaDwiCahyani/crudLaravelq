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
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn tema-sidebar text-light">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        
    </form>
</div>
