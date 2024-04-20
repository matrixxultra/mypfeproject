<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Notes</title>
</head>
<body>
      <center> <h1>Les NoteS de {{$name}} {{$prenom}}</h1> </center>
    <table border="1" width="100%" >

            <tr >
                <th>Module</th>
                <th>Formateur</th>
                <th>Controle 1 </th>
                <th>Controle 2 </th>
                <th>Controle 3 </th>
                <th>EFM</th>
                <th>EFR</th>
            </tr>
        @foreach ($notes as $i)
         <tr >
            <td>{{$i->module->name}}</td>
            <td>{{$i->formateur->name}}</td>
            <td>{{$i->controle_1}}</td>
            <td>{{$i->controle_2}}</td>
            <td>{{$i->controle_3}}</td>
            <td>{{$i->EFM}}</td>
            <td>{{$i->EFR}}</td>
        </tr>
        @endforeach


    </table>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
