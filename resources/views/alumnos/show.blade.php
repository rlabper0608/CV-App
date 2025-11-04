@extends('bootstrap.template')

@section('content')
<main class="px-3">
    <h1>{{ $alumno->nombre }}</h1> 
    <p class="lead">
        <img src="{{ $alumno->getPath() }}" width="30%">
    </p>
    <p class="lead">
          
    <p class="lead">
      <h1>Formacion</h1>
        {{ $alumno->formacion }}
    </p>
    <br>
    <p class="lead">
      <h1>Experiencia</h1>
        {{ $alumno->experiencia }}
    </p>
    <br>
    <p class="lead">
      <h1>Habilidades</h1>
        {{ $alumno->habilidades }}
    </p>
    <p class="lead">
        <a href="#" class="btn btn-lg btn-light fw-bold border-white bg-white">
            {{ $alumno->nombre }}
        </a>
         <span class="fw-bold">
            {{ $alumno->correo }}
            <br>
            +34 {{ $alumno->telefono }}
            <br>
            {{ $alumno->nota_media}}
         </span>
    </p>
</main>
@endsection