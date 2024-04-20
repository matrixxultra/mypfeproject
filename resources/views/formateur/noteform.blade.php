@extends('formateur.master')
@section('object')
Saisir les Note {{$groupe->name}}
@endsection
@section('main')
<form class="container" action="/formateur/notes/store" method="post">
    @csrf
   <label><strong>Stagiaire : </strong></label>
    <select name="stagiaire_id" class="form-select form-select-lg mb-3" aria-label="Large select example">
        <option value="" selected>Selecter Stagiaire</option>
        @foreach ($groupe->stagiaires as $i)
        <option value="{{$i->id}}">{{$i->name}}</option>
        @endforeach
      </select> <br>
      <label><strong>Module : </strong></label>
      <select name="module_id" class="form-select form-select-lg mb-3" aria-label="Large select example">
        <option value="" selected>Selecter le Module</option>
        @foreach ($formateur->modules as $i)
        <option value="{{$i->id}}">{{$i->name}}</option>
        @endforeach
      </select>
      <label><strong>Controle 1  : </strong></label>
      <div class="input-group input-group-lg">
        <span class="input-group-text" id="inputGroup-sizing-lg">CC1</span>
        <input type="text" name="controle_1" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
      </div>
       <br>
       <label><strong>Controle 2 : </strong></label>
      <div class="input-group input-group-lg">
        <span class="input-group-text" id="inputGroup-sizing-lg">CC2</span>
        <input type="text" name="controle_2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
      </div>
      <br>
      <label><strong>Controle 3 : </strong></label>
      <div class="input-group input-group-lg">
        <span class="input-group-text" id="inputGroup-sizing-lg">CC3</span>
        <input type="text" name="controle_3" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
      </div>
      <br>
      <label><strong>Exemen Fin de Module : </strong></label>
      <div class="input-group input-group-lg">
        <span class="input-group-text" id="inputGroup-sizing-lg">EFM</span>
        <input type="text" name="EFM" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
      </div>
      <br>
      <button class="btn btn-primary">Ajouter la Note</button>
</form>
@endsection
