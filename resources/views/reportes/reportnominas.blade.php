<!DOCTYPE html>
<html>
<head>
<title>Reporte de nominas</title>
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
<h2 id="tittle">Reporte de nominas {{$tittle}}</h2>
<h4>Candidato:</h4>
<h4>Fecha: {{$mytime}}</h4>

<table id="voters">
<tr>
      <th>Nombre</th>
      <th>Sueldo</th>
      <th>Observaciones</th>
      <th>Fecha</th>
    </tr>
    @foreach($nominas as $nomina)
    <tr>
      <td>{{ $nomina->datos->name }}</td>
      <td>${{ number_format($nomina->sueldo, 2 ,'.',',' ) }}</td>
      <td>{{ $nomina->observaciones }}</td>
      <td>{{ $nomina->created_at->format('d-m-Y') }}</td>
    </tr>
    @endforeach
    <tr>
      <td>Total</td>
      <td>${{number_format($nominastotal, 2 ,'.',',' )}}</td>
      <td></td>
      <td></td>
    </tr>
</table>

</body>
</html>