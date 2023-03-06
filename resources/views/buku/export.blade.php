<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Data Buku</title>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
        border: 1px solid black;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }
    </style>
</head>

<body>
    <h1>Data Buku</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buku as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->pengarang }}</td>
                <td>{{ $item->penerbit }}</td>
                <td>{{ date('d M Y', strtotime($item->tanggal_terbit)) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>