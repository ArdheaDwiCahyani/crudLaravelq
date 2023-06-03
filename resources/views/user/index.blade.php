@extends('layouts.app')

@section('title', 'Data User')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <a href="{{ route('user.tambah') }}" class="btn tema-sidebar text-light mb-3 mr-2"> Tambah User </a>
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
                            <td>{{ $row -> nama }}</td>
                            <td>{{ $row -> jenis_kelamin }}</td>
                            <td>{{ $row -> no_telp }}</td>
                            <td>
                                <a href="{{ route('user.edit', $row->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('user.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection