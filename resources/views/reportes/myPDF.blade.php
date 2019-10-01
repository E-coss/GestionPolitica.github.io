<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>votantes</title>
    <style>
        .table{

            border: 1px solid #999999;
            height: 300px;
            width: 100%;
        }
    </style>
</head>

<body>
    <h1 align="center">Votantes inscritos</h1>
    <table class="table" align="center">
         
        <thead>
           
            <tr>
                <th>id</th>
                <th>nombre</th>
                <th>sexo</th>
            </tr>
        </thead>

        <tbody>

            @foreach($data as $datas)

            <tr>
                <td>{{ $datas->id }}</td>
                <td>{{ $datas->nombre }}</td>
                <td>{{ $datas->sexo }}</td>

            </tr>
            @endforeach

        </tbody>
    </table>
    
</body>
</html>