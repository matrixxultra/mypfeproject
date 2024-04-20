@extends('admin.master')
@section('object')
Editer
@endsection
@section('main')
<form action="/admins/formateur/{{$formateur->id}}/update" method="post">
    @csrf
    @method("PUT")
    Name  : <input type="text" value="{{$formateur->name}}" name="name" readonly> <br>
    E-Mail : <input type="text" value="{{$formateur->email}}" name="email" readonly><br>
    <h6><strong>Les Groupes</strong></h6>
    @foreach ($groupes as $g)
      <input type="checkbox" name="groupes[]" value="{{$g->id}}"
      {{$formateur->groupes->contains($g->id)?"checked" : ""}}>
      <label>{{$g->name}}</label>
      <br>
    @endforeach
    <br>
    <h6><strong>Les Modules</strong></h6>
    @foreach ($modules as $g)
    <input type="checkbox" name="modules[]" value="{{$g->id}}"
    {{$formateur->modules->contains($g->id)?"checked" : ""}} ><label>{{$g->name}}</label>
    <br>
  @endforeach
<br>
  <button class="btn btn-warning">Modifier</button>
</form>
@endsection
