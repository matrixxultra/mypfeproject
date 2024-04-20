@extends('student.master')
@section('object')
Notes de {{$stagiaire->name}} {{$stagiaire->prenom}}
@endsection
@section('main')

<div class="card mb-4">

    <div class="card-body">
        <a class="btn btn-primary" href="/students/notes/download">Télecharger Mes Notes</a> <br> <br>
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Module</th>
                    <th>Formateur</th>
                    <th>Controle 1 </th>
                    <th>Controle 2 </th>
                    <th>Controle 3 </th>
                    <th>EFM</th>
                    <th>EFR</th>
                    <th>Reclamation</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Module</th>
                    <th>Formateur</th>
                    <th>Controle 1 </th>
                    <th>Controle 2</th>
                    <th>Controle 3 </th>
                    <th>EFM</th>
                    <th>EFR</th>
                    <th>Réclamation</th>
                </tr>
            </tfoot>
           <tbody>
            @foreach ($stagiaire->notes as $i)
             <tr>
                <td>{{$i->module->name}}</td>
                <td>{{$i->formateur->name}}</td>
                <td>{{$i->controle_1}}</td>
                <td>{{$i->controle_2}}</td>
                <td>{{$i->controle_3}}</td>
                <td>{{$i->EFM}}</td>
                <td>{{$i->EFR}}</td>
                <td><a class="btn btn-info" href="/students/réclamer/{{$i->id}}">Réclamer</a></td>
            </tr>
            @endforeach

           </tbody>
        </table>
    </div>
</div>
@endsection
