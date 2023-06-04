<div>
    <form wire:submit.prevent='update'>
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_kos">Nama Kos</label>
                            <select class="form-control" name="sub_kriteria_id" id="sub_kriteria_id" wire:model="kos_id">
                                <option hidden>Pilih Alternatif Kos</option>
                                <option disabled="disabled" default="true">Pilih Alternatif Kos</option>
                                @foreach ($alternatif_kos as $alternatif)
                                    <option value="{{ $alternatif->id }}">{{ $alternatif->nama_kos }}</option>
                                @endforeach
                            </select>
                        </div>
                        @foreach ($data_kriteria as $kriteria)
                            <div class="form-group">
                                <label for="sub_kriteria_id">{{ $kriteria['kriteria']->kriteria }}</label>
                                <select class="form-control" name="sub_kriteria_id" id="sub_kriteria_id"
                                    wire:model="krit_and_sub.{{ $kriteria['kriteria']->id }}"
                                    wire:key="krit_and_sub.{{ $kriteria['kriteria']->id }}">
                                    <option hidden>Pilih Sub Kriteria</option>
                                    <option disabled="disabled" default="true">Pilih Sub Kriteria</option>
                                    @foreach ($kriteria['sub_kriteria'] as $sub)
                                        <option value="{{ $sub->bobot_sub }}">{{ $sub->sub_kriteria }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>

