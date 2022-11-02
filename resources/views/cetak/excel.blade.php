<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Jurusan Siswa</title>
</head>
<body>
    <br/>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>NAMA</th>
                <th>JURUSAN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index=>$item)
            <tr>
                <td>{{ $index+1 }}</td>
                <td>'{{ $item->nisn }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->jurusan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
