@extends('layouts.app')

@section('title', 'Data Sub Kriteria')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <a href="{{ route('sub_kriteria.tambah') }}" class="btn tema-sidebar text-light mb-3 mr-2"> Tambah Sub Kriteria </a>
        <a class="btn tema-text font-weight-bold mb-3 tema-border" href="#">Export PDF</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kriteria</th>
                        <th>Sub Kriteria</th>
                        <th>Bobot Sub</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php ($no = 1)
                    @foreach ($sub_kriteria as $row)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $row -> kriteria-> kriteria }}</td>
                            <td>{{ $row -> sub_kriteria }}</td>
                            <td>{{ $row -> bobot_sub }}</td>
                            <td>
                                <a href="{{ route('sub_kriteria.edit', $row->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('sub_kriteria.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection