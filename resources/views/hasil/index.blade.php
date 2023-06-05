@extends('layouts.app')

@section('title', 'Data Hasil')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        {{-- <a href="{{ route('hasil.tambah') }}" class="btn tema-sidebar text-light mb-3 mr-2"> Tambah Hasil </a> --}}
        <a class="btn tema-text font-weight-bold mb-3 tema-border" href="{{ route('pdfhasil') }}">Export PDF</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Ranking</th>
                        <th>Nama Kos</th>
                        <th>Hasil SAW</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasil as $item)
                    <tr>
                        <td>{{ $item->ranking }}</td>
                        <td>{{ $item->alternatif_kos->nama_kos }}</td>
                        <td>{{ $item->nilai }}</td>
                    </tr>
                    @endforeach
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