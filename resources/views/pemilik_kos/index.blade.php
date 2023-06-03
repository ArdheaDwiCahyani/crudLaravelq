@extends('layouts.app')

@section('title', 'Data Pemilik Kos')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pemilik Kos</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('pemilik_kos.tambah') }}" class="btn btn-primary mb-3 mr-2"> Tambah Pemilik Kos </a>
        <a class="btn tema-text font-weight-bold mb-3 tema-border" href="#">Export PDF</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        {{-- <th>Email</th>
                        <th>Password</th> --}}
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>No. Telp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php ($no = 1)
                    @foreach ($user as $row)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $row -> username }}</td>
                            {{-- <td>{{ $row -> email }}</td>
                            <td>{{ $row -> password }}</td> --}}
                            <td>{{ $row -> nama }}</td>
                            <td>{{ $row -> nik }}</td>
                            <td>{{ $row -> alamat }}</td>
                            <td>{{ $row -> jenis_kelamin }}</td>
                            <td>{{ $row -> no_telp }}</td>
                            <td>
                                <a href="{{ route('pemilik_kos.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('pemilik_kos.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection