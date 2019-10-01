<!DOCTYPE html>
<html>
<head>
<title>Reporte de votantes</title>
<style>
#voters {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#voters td, #voters th {
  border: 1px solid #ddd;
  padding: 6px;
}

#voters th {
  padding-top: 6px;
  padding-bottom: 6px;
  text-align: left;
  background-color: #ddd;
}

#tittle{
    text-align: center; 
    }
</style>
</head>
<body>
<h2 id="tittle">Reporte de votantes {{$tittle}}</h2>
<h4>Candidato:</h4>
<h4>Fecha: {{$mytime}}</h4>

<table id="voters">
<tr>
      <th>Nombre</th>
      <th>Cédula</th>
      <th>Sexo</th>
      <th>Colegio</th>
      <th>Ciudad</th>
    </tr>
    @foreach($votantes as $votante)
    <tr>
      <td>{{ $votante->nombre }}</td>
      <td>{{ $votante->cedula }}</td>
      <td>{{ $votante->sexo }}</td>
      <td>{{ $votante->colegio_id }}</td>
      <td>{{ $votante->ciudad }}</td>
    </tr>
    @endforeach
</table>

</body>
</html>