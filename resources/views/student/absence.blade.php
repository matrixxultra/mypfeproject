@extends('student.master')
@section('object')
les Absence de {{$stagiaire->name}} {{$stagiaire->prenom}}
@endsection
@section('main')
<div class="card mb-4">

    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Module</th>
                    <th>Formateur</th>
                    <th>8:30 à 11:00</th>
                    <th>11:00 à 13:30</th>
                    <th>13:30 : 16:00</th>
                    <th>16:00 à 18:30</th>
                    <th>le Jour</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Module</th>
                    <th>Formateur</th>
                    <th>8:30 à 11:00</th>
                    <th>11:00 à 13:30</th>
                    <th>13:30 : 16:00</th>
                    <th>16:00 à 18:30</th>
                    <th>le Jour</th>
                </tr>
            </tfoot>
           <tbody>
            @foreach ($stagiaire->absences as $i)
             <tr>
                <td>{{$i->module->name}}</td>
                <td>{{$i->formateur->name}}</td>
                <td>{{$i->matin1}}</td>
                <td>{{$i->matin2}}</td>
                <td>{{$i->soir1}}</td>
                <td>{{$i->soir2}}</td>
                <td>{{$i->la_date}}</td>
            </tr>
            @endforeach

           </tbody>
        </table>
    </div>
</div>
@endsection
