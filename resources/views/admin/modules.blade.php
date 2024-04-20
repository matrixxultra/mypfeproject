@extends('admin.master')
@section('object')
les Modules de Chaque Groupe
@endsection
@section('main')
@foreach ($groupes as $gr)
<details>
    <summary>

       <a href="/admins/modules/{{$gr->id}}">{{$gr->name}}</a> 
    </summary>

    <ul>
        @foreach ($gr->modules as $i)
        <li>{{$i->name}}</li>
        @endforeach


    </ul>
</details>
@endforeach



<style>
details {
  width: 80%;
  margin: 0 auto;
  background: #282828;
  margin-bottom: 0.5rem;
  box-shadow: 0 0.1rem 1rem -0.5rem rgba(0, 0, 0, 0.4);
  border-radius: 5px;
  overflow: hidden;
  color : white;
}

summary {
  padding: 1rem;
  display: block;
  color: #fff;
  background: #333;
  padding-left: 2.2rem;
  position: relative;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

summary:before {
  content: "";
  border-width: 0.4rem;
  border-style: solid;
  border-color: transparent transparent transparent #fff;
  position: absolute;
  top: 1.3rem;
  left: 1rem;
  transform: rotate(0);
  transform-origin: 0.2rem 50%;
  transition: 0.25s transform ease;
}


details[open] > summary:before {
  transform: rotate(90deg);
}

details summary::-webkit-details-marker {
  display: none;
}

details > ul {
  padding-bottom: 1rem;
  margin-bottom: 0;
}


</style>
@endsection