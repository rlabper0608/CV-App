@extends('bootstrap.template')

@section('content')

<!-- Ventanas Modales principio -->

<div class="modal fade" id="destroyModal" tabindex="-1" aria-labelledby="destroyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="destroyModalLabel">¿Seguro que quieres borrar a este alumno?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="destroyModalContent">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button  form="form-delete" type="submit" class="btn btn-primary">Delete</button>
      </div>
    </div>
  </div>
</div>

<!-- Ventanas modales fin -->

<hr>

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
            <td>{{ $alum->id }}</td>
            <td>{{ $alum->nombre }}</td>
            <td>{{ $alum->apellidos }}</td>
            <td>{{ $alum->correo }}</td>
            <td>
                <a href=" {{ route('alumnos.show', $alum->id) }}" class="btn btn-success btn-sm">Show</a>
                <a href=" {{ route('alumnos.edit', $alum->id) }}" class="btn btn-warning btn-sm text-white">Edit</a>
                <a class="link-destroy btn btn-danger btn-sm text-white" 
                  data-bs-toggle="modal"
                  data-bs-target="#destroyModal"
                  data-href="{{ route('alumnos.destroy', $alum->id)}}" 
                  data-alumno="{{ $alum->nombre }}">Delete</a>
            </td>
        </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
        <th colspan="3">Número de alumnos registrados:</th>
        <th>{{ count($alumno) }}</th>
    </tr>
  </tfoot>
</table>

<form action="" method="post" id="form-delete">
    @csrf
    @method('delete')
</form>

@endsection

