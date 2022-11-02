
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Jurusan Siswa</title>
    <style>
        .body{
            /* background-image: url(../public/images/logo.png); */
            background-size: 40%;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            height: 100%;
            padding: 0%;
        }
        .title{
            text-align: center;
            font-size: 2.5em;
            color: #000;
        }

    </style>
</head>
<body class="body">
    <div>
        <div>
            <table width="100%">
                <tr>
                {{-- <td width="25%" align="center"><img src="images/app/suger.jpeg" width="60%"></td> --}}
                <td width="25%" align="center"><input hidden width="100%"></td>
                <td width="50%" align="center"><h2>List Jurusan Siswa<br/>SMA Negeri 1 Sungai Geringging</h2>
                </td>
                <td width="25%" align="center"><input hidden width="100%"></td>
                </tr>
            </table>
            <hr/>

        </div>

        <div style="align-content: center;"><br/>
            <table style="margin-left:auto;margin-right:auto" border="1" cellspacing="0" cellpadding="0" width="100%">
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
                        <td>{{ $item->nisn }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->jurusan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>


