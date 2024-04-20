@extends('student.master')
@section('object')
Mon Classe {{$stagiaire->groupe->name}}
@endsection
@section('main')
<div class="card-body">
    <table id="datatablesSimple">
        <thead>
            <tr>
                <th>Name</th>
                <th>Prenom</th>
                <th>E-mail</th>
                <th>Filiere</th>
                <th>Cin</th>
                <th>Numero de Téléphone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Prenom</th>
                <th>E-mail</th>
                <th>Filiere</th>
                <th>Cin</th>
                <th>Numero de Téléphone</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($stagiaire->groupe->stagiaires as $d)
              <tr>
                <td>{{$d->name}}</td>
                <td>{{$d->prenom}}</td>
                <td>{{$d->email}}</td>
                <td>{{$d->filiere->name}}</td>
                <td>Comming Soon</td>
                <td>Comming Soon</td>
                <td>Comming Soon</td>
              </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
