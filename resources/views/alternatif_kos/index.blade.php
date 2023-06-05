@extends('layouts.app')

@section('title', 'Data Alternatif Kos')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <a href="{{ route('alternatif_kos.tambah') }}" class="btn tema-sidebar text-light mb-3 mr-2"> Tambah Alternatif
                Kos </a>
            <a class="btn tema-text font-weight-bold mb-3 tema-border" href="{{ route('pdfalternatif_kos') }}">Export PDF</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kos</th>
                            <th>Jenis Kos</th>
                            <th>Alamat</th>
                            <th>Pemilik</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @foreach ($alternatif_kos as $key => $row)
                            <tr>
                                <th>{{ $no++ }}</th>
                                <td>{{ $row->nama_kos }}</td>
                                <td>{{ $row->jenis_kos }}</td>
                                <td>{{ $row->alamat }}</td>
                                <td>{{ $row->pemilik->nama }}</td>
                            <td>
                                <a href="{{ route('alternatif_kos.edit', $row->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('alternatif_kos.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                            </td> 
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
