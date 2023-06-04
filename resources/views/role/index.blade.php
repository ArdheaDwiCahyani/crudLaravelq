@extends('layouts.app')

@section('title', 'Data Role')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <a href="{{ route('role.tambah') }}" class="btn tema-sidebar text-light mb-3 mr-2"> Tambah Role </a>
        <a class="btn tema-text font-weight-bold mb-3 tema-border" href="{{ route('pdfrole') }}">Export PDF</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Role User</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php ($no = 1)
                    @foreach ($role as $row)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $row -> role_user }}</td>
                            <td>
                                <a href="{{ route('role.edit', $row->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('role.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection