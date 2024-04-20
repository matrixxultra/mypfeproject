@extends('formateur.master')
@section('object')
les Groupes Affecté à {{$formateur->name}} {{$formateur->prenom}}
@endsection
@section('main')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
       la Liste des Stagiaires de {{$groupe->name}}
    </div>

    <div class="card-body">
         <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Date_naisssance</th>
                    <th>Filiere</th>
                    <th>Numero de Telephone</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Date_naisssance</th>
                    <th>Filiere</th>
                    <th>Numero de Telephone</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($groupe->stagiaires as $i)


                <tr>
                    <td>{{$i->name}}</td>
                    <td>{{$i->prenom}}</td>
                    <td>{{$i->email}}</td>
                    <td>{{$i->groupe->name}}</td>
                    <td>{{$i->filiere->name}}</td>
                    <td>Comming Soon</td>
                </tr>
                @endforeach
            </tbody>
         </table>
    </div>
</div>
@endsection
