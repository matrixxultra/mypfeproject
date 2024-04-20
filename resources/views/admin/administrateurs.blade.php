@extends('admin.master')
@section('object')
Administrateurs
@endsection
@section('main')

    <table id="datatablesSimple">
        <thead>
            <tr>
                <th>Name</th>
                <th>Prenom</th>
                <th>E-mail</th>
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
                <th>Cin</th>
                <th>Numero de Téléphone</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($admins as $d)
              <tr>
                <td>{{$d->name}}</td>
                <td>{{$d->prenom}}</td>
                <td>{{$d->email}}</td>
                <td>Comming Soon</td>
                <td>Comming Soon</td>
                <td>

                 <a class="btn btn-warning" href="#">Modifier</a>
                   <form action="/destroy/{{$d->id}}" method="post">
                    @method("delete")
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                    </form>
                  
               </td>
              </tr>
            @endforeach
        </tbody>
    </table>

  
@endsection