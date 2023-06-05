<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Penilaian</title>

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
    <h1>Data Penilaian</h1>
    <table align="center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kos</th>
                @foreach ($kriteria as $item)
                    <th>{{ $item->kriteria }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @php($no = 1)
            @foreach ($hasil as $key => $alternatif)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $alternatif['nama_kos'] }}</td>
                @foreach ($alternatif['hasil_normalisasi'] as $item)
                    <td>{{ $item }}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</body>

</html>
