<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >

    <title>Liste Admis</title>
</head>
<body>
    <center>
        <h1>La liste des Candidats Par Order de Merite</h1>
   </center>
{{--
    <a class="btn btn-info" href="/admins/telecharger">Telecharger la Liste des Admis</a> --}}
<table width="100%" border="1" class="table table-bordered">
    <tr scop="col">
        <th scop="col">Name</th>
        <th scop="col">Note</th>
        <th scop="col">Filiere</th>
        <th scop="col">Bac</th>
    </tr>
    @foreach ($filterData as $l)
    <tr class="primary-table">
        <td class="primary-table">{{$l->name}}</td>
        <td class="primary-table">{{$l->note_bac}}</td>
        <td class="primary-table">{{$l->filiere->name}}</td>
        <td class="primary-table">{{$l->bac->type_bac}}</td>
    </tr>
    @endforeach
</table>


</body>
</html>
