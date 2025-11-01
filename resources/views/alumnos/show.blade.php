@extends('bootstrap.template')

@section('content')
<table class="table table-hover">
  <thead>
    <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Correo</th>
    </tr>
  </thead>
  <tbody>
    @foreach($alumno as $alum)
        <tr>
            <td>{{ $alum->nombre }}</td>
            <td>{{ $alum->apellidos }}</td>
            <td>{{ $alum->correo }}</td>
            <td>
                <a href=" {{ route('alumnos.show', $alum->id) }}" class="btn btn-success btn-sm">Show</a>
                <a href=" {{ route('alumnos.edit', $alum->id) }}" class="btn btn-warning btn-sm text-white">Edit</a>
                <a class="link-destroy btn btn-danger btn-sm text-white"
                  data-href="{{ route('alumnos.destroy', $alum->id)}}" 
                  data-peinado="{{ $alum->nombre }}"
                >Delete</a>
                <a class="link-destroy btn btn-danger btn-sm text-white" 
                  data-bs-toggle="modal"
                  data-bs-target="#destroyModal"
                  data-href="{{ route('alumnos.destroy', $alum->id)}}" 
                  data-peinado="{{ $alum->nombre }}">Delete</a>
            </td>
        </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
        <th colspan="3">Número de CVs guardados:</th>
        <th>{{ count($alumno) }}</th>
    </tr>
  </tfoot>
</table>
@endsection