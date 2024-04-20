@extends('admin.master')
@section('object')
Gérer les Absences
@endsection
@section('main')
<div class="card mb-4">

<div class="card-body">
    <table id="datatablesSimple">
        <thead>
            <tr>
                <th>Stagiaire</th>
                <th>Module</th>
                <th>Formateur</th>
                <th>8-11</th>
                <th>11-13:30</th>
                <th>13:30-16:00</th>
                <th>16:00-18:30</th>
                <th>Status</th>

            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Stagiaire</th>
                <th>Module</th>
                <th>Formateur</th>
                <th>8-11</th>
                <th>11-13:30</th>
                <th>13:30-16:00</th>
                <th>16:00-18:30</th>
                <th>Status</th>

            </tr>
        </tfoot>
        <tbody>
            @foreach ($absence as $a)
              <tr>
                <td>{{$a->stagiaire->name}}</td>
                <td>{{$a->module->name}}</td>
                <td>{{$a->formateur->name}}</td>
                <td>{{$a->matin1}}</td>
                <td>{{$a->matin2}}</td>
                <td>{{$a->soir1}}</td>
                <td>{{$a->soir2}}</td>
                <td>
                    <form action="" method="post">
                        @csrf
                        @method("put")
                        <select name="status">
                            <option value="justifié">Justifié</option>
                            <option value="non_justifié">Non_Justifier</option>
                        </select>
                        <button class="btn btn-success">Valider</button>

                    </form>

                </td>

              </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

@endsection
