<div class="card shadow mb-4">
    <div class="card-body">
        <a href="{{ route('penilaian.tambah') }}" class="btn tema-sidebar text-light mb-3 mr-2"> Tambah Penilaian </a>
        <a class="btn tema-text font-weight-bold mb-3 tema-border" href="#">Export PDF</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kos</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $item['nama_kos'] }}</td>
                        <td>{{ $item['hasil'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>