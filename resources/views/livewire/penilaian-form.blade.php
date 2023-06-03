<div>
    <form action="{{ isset($penilaian) ? route('penilaian.tambah.update', $penilaian->id) : route('penilaian.tambah.simpan') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_kos">Nama Kos</label>
                            <input type="text" class="form-control" id="nama_kos" name="nama_kos" value="{{ isset($nama_kos) ? $nama_kos->nama_kos : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="nilai">Nilai</label>
                            <input type="number" class="form-control" id="nilai" name="nilai" value="{{ isset($nilai) ? $nilai->nilai : '' }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        
    </form>
</div>
