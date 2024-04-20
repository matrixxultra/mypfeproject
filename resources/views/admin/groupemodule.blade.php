@extends('admin.master')
@section('object')
Voir / Modifier 
@endsection
@section('main')
<form action="/admins/modules/{{$groupe->id}}/update" method="post">
    @csrf
    @method("PUT")
    Name  : <input type="text" value="{{$groupe->name}}" name="name" readonly> <br>
 

 

    <h6><strong>Les Modules</strong></h6>
    @foreach ($modules as $m)
    <input type="checkbox" name="modules[]" value="{{$m->id}}"
    {{$groupe->modules->contains($m->id)?"checked" : ""}} ><label>{{$m->name}}</label>
    <br>
  @endforeach
<br>
  <button class="btn btn-warning">Modifier</button>
</form>
@endsection