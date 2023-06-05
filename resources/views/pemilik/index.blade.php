@extends('layouts.app')

@section('title', 'Data Pemilik')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <a href="{{ route('pemilik.tambah') }}" class="btn tema-sidebar text-light  mb-3 mr-2"> Tambah Pemilik </a>
            <a class="btn tema-text font-weight-bold mb-3 tema-border" href="{{ route('pdfpemilik') }}"> Export PDF</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>No. Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @foreach ($pemilik as $row)
                            <tr>
                                <th>{{ $no++ }}</th>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->jenis_kelamin }}</td>
                                <td>{{ $row->no_telp }}</td>
                                <td>
                                    <a href="{{ route('pemilik.edit', $row->id) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ route('pemilik.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
