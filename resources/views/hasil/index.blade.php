@extends('layouts.app')

@section('title', 'Data Hasil')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <a href="{{ route('hasil.tambah') }}" class="btn tema-sidebar text-light mb-3 mr-2"> Tambah Hasil </a>
        <a class="btn tema-text font-weight-bold mb-3 tema-border" href="#">Export PDF</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Ranking</th>
                        <th>Nama Kos</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Kos Melati</td>
                        <td>
                            <a href="#" class="btn btn-success">Edit</a>
                            <a href="#" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Kos Andara</td>
                        <td>
                            <a href="#" class="btn btn-success">Edit</a>
                            <a href="#" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Kos Biru</td>
                        <td>
                            <a href="#" class="btn btn-success">Edit</a>
                            <a href="#" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    {{-- @php ($no = 1)
                    @foreach ($hasil as $row)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $row -> ranking }}</td>
                            <td>{{ $row -> nama_kos }}</td>
                            <td>
                                <a href="{{ route('hasil.edit', $row->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('hasil.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection