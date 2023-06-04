<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Kos</title>

    <style>
        body {
            box-sizing: border-box;
            font-size: 16px;
        }

        h1 {
            text-align: center;
        }

        table {
            box-sizing: border-box;
            border: 2px solid black;
            border-collapse: collapse;
            width: 100%;
        }

        thead {
            background-color: rgb(173 86 138);
            color: white;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            text-align: left;
            padding: 10px;
        }

        .center {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Data Kos</h1>
    <table align="center">
        <thead>
            <tr>
                {{-- <th>No</th>
                <th>Nama Kos</th>
                <th>Jenis Kos</th>
                <th>Biaya</th>
                <th>Fasilitas</th>
                <th></th>
                <th></th>
                <th></th> --}}
            </tr>
        </thead>
        <tbody>
            @php($no = 1)
            @foreach ($alternatif_kos as $key => $row)
                <tr>
                    <th>{{ $no++ }}</th>
                    <td>{{ $row['nama_kos'] }}</td>
                    <td>{{ $row['jenis_kos'] }}</td>
                    @foreach ($row['data_kriteria'] as $kriteria)
                        @foreach ($kriteria['sub_kriteria'] as $sub)
                            <td>{{ $sub->sub_kriteria }}</td>
                        @endforeach
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
