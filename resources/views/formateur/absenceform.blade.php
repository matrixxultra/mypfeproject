@extends('formateur.master')
@section('object')
Saisir l'Absence de {{$groupe->name}} à {{date("d-m-Y")}}
@endsection
@section('main')

{{-- @if (errors()->any())
@foreach ($error as $i)
<li>{{$i->message}}</li>
@endforeach

@endif --}}
<form class="container" action="/formateur/absence/store" method="post">
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
      <label><strong>8:30 à 11:00  : </strong></label>
      <div class="input-group input-group-lg">
        <span class="input-group-text" id="inputGroup-sizing-lg">8:30 à 11:00</span>
        <input type="text" class="form-control" name="matin1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
      </div>
       <br>
       <label><strong>11:00 à 13:30 : </strong></label>
      <div class="input-group input-group-lg">
        <span class="input-group-text" id="inputGroup-sizing-lg">11:00 à 13:30</span>
        <input type="text" class="form-control" name="matin2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
      </div>
      <br>
      <label><strong>13:30 à 16:00 : </strong></label>
      <div class="input-group input-group-lg">
        <span class="input-group-text" id="inputGroup-sizing-lg">13:30 à 16:00</span>
        <input type="text" class="form-control" name="soir1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
      </div>
      <br>
      <label><strong>16:00 à 18:30 : </strong></label>
      <div class="input-group input-group-lg">
        <span class="input-group-text" id="inputGroup-sizing-lg">16:00 à 18:30</span>
        <input type="text" class="form-control" name="soir2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
      </div>
      <br>
      <button class="btn btn-primary">Ajouter l'Absence</button>
</form>
@endsection
