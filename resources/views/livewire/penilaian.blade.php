<div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <a wire:click="create" class="btn tema-sidebar text-light mb-3 mr-2"> Tambah Penilaian </a>
            <a class="btn tema-text font-weight-bold mb-3 tema-border" href="#">Export PDF</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kos</th>
                            @foreach ($kriteria as $item)
                                <th>{{ $item->kriteria }}</th>
                            @endforeach
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($groupKos as $key => $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item['nama_kos'] }}</td>
                                @foreach ($item['nilai'] as $nilai)
                                    <td>{{ $nilai['nilai'] }}</td>
                                @endforeach
                                <td class="text-center"> --}}
                                    {{-- <a href="{{ route('penilaian.edit', $item['kos_id']) }}"
                                        class="btn btn-sm btn-primary">EDIT</a> --}}
                                    {{-- <button wire:click="destroy({{ $post->id }})" class="btn btn-sm btn-danger">DELETE</button> --}}
                                {{-- </td>
                            </tr>
                        @endforeach --}}
                        @foreach ($hasil as $key => $alternatif)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $alternatif['nama_kos'] }}</td>
                                @foreach ($alternatif['hasil_normalisasi'] as $item)
                                    <td>{{ $item }}</td>
                                @endforeach
                                <td class="text-center">
                                    <a href="{{ route('penilaian.edit', $alternatif['kos_id']) }}"
                                        class="btn btn-sm btn-primary">EDIT</a>
                                    {{-- <button wire:click="destroy({{ $post->id }})" class="btn btn-sm btn-danger">DELETE</button> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
