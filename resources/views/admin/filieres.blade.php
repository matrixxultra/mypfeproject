@extends('admin.master')
@section('object')
Filieres
@endsection
@section('main')

@foreach ($filieres as $f)
<details>
    <summary>

        {{$f->name}}
        <button class="btn btn-warning">Modifier</button>
        {{--AKHI HAMZA HNA KHHDMTK M3AK IDRISS HHHHHHHH--}}
        
        {{-- <form action="" method="post">
            @csrf
            @method("delete")
            <button class="btn btn-danger">Supprimmer</button>
        </form> --}}

    </summary>

    <ul>
        @foreach ($f->groupes as $i)
        <li><a href="/admins/filieres/groupe/{{$i->id}}">{{$i->name}}</a></li>
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
