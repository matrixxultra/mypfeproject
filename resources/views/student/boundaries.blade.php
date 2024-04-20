@extends('student.master')
@section('object')
les Difficulté en tant que Stagiaire
@endsection
@section('main')
<form action="/students/difficulte" method="POST">
    @csrf
<div class="input-group">
    <span class="input-group-text">Votre Probléme</span>
    <textarea class="form-control" name="message" aria-label="With textarea"></textarea>
  </div> <br>
  <button class="btn btn-primary">Envoyer</button>
</form>
@endsection
