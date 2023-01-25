@extends('layout')

@section('content')
<div class="card mt-3 p-3 formEdit">
  <form action="{{ route('editCharacter')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $show[0]->id }}" readonly>
    <div class="row ">
      <div class="mb-3 col-6">
        <label for="Nombre" class="form-label fw-bold">Nombre:</label>
        <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{ $show[0]->name }}">
      </div>
      <div class="mb-3 col-6">
        <label for="Estado" class="form-label fw-bold">Estado:</label>
        <input type="text" name="Estado" id="Estado" class="form-control" value="{{ $show[0]->status }}">
      </div>
    </div>
    <div class="row ">
      <div class="mb-3 col-6">
        <label for="Especie" class="form-label fw-bold">Especie:</label>
        <input type="text" name="Especie" id="Especie" class="form-control" value="{{ $show[0]->species }}">
      </div>
      <div class="mb-3 col-6">
        <label for="Tipo" class="form-label fw-bold">Tipo:</label>
        <input type="text" name="Tipo" id="Tipo" class="form-control" value="{{ $show[0]->type }}">
      </div>
    </div>
    <div class="row ">
      <div class="mb-3 col-6">
        <label for="Genero" class="form-label fw-bold">Género:</label>
        <input type="text" name="Genero" id="Genero" class="form-control" value="{{ $show[0]->gender }}">
      </div>
      <div class="mb-3 col-6">
        <label for="Origen" class="form-label fw-bold">Origen:</label>
        <input type="text" name="Origen" id="Origen" class="form-control" value="{{ $show[0]->nameOrigin }}">
      </div>
    </div>
    <div class="row ">
      <div class="mb-3 col-6">
        <label for="Url" class="form-label fw-bold">Url:</label>
        <input type="text" name="Url" id="Url" class="form-control" value="{{ $show[0]->url }}">
      </div>
      <div class="mb-3 col-6">
        <label for="Imagen" class="form-label fw-bold">Dirección imagen:</label>
        <input type="text" name="Imagen" id="Imagen" class="form-control" value="{{ $show[0]->image }}">
      </div>
      <div class="mb-3 col-6">
        <button class="btn btn-outline-success">Guardar</button>
      </div>
    </div>
  </form>
</div>
@endsection