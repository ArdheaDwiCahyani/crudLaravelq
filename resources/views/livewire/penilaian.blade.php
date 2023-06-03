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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Kos Melati</td>
                        <td>86</td>
                        <td>
                            <a href="#" class="btn btn-success">Edit</a>
                            <a href="#" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Kos Andara</td>
                        <td>87</td>
                        <td>
                            <a href="#" class="btn btn-success">Edit</a>
                            <a href="#" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    {{-- @php ($no = 1)
                    @foreach ($nilai as $row)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $row -> alternatif_kos }}</td>
                            <td>{{ $row -> nilai }}</td>
                            <td>
                                <a href="{{ route('sub_kriteria.edit', $row->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('sub_kriteria.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>