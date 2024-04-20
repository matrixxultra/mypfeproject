@extends('student.master')
@section('object')
Réclamation
@endsection
@section('main')
<form action="/students/réclamer" method="post">
    @csrf
<div class="input-group input-group-lg">
    <span class="input-group-text" id="inputGroup-sizing-lg">Formateur Email</span>
    <input type="text" name="email" class="form-control" value="{{$email}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
  </div> <br>
  <div class="input-group">
    <span class="input-group-text">Votre Probléme</span>
    <textarea class="form-control" name="message" aria-label="With textarea"></textarea>
  </div> <br>
  <button class="btn btn-primary">Envoyer</button>
</form>
@endsection
