@extends('app')
<!-- VISTA PARA CREAR LA CATEGORIA -->
@section('content')
<div class="container mt-5">
  <div class="card shadow-lg p-4 bg-white rounded">
    <h2 class="mb-4 text-primary text-center fw-bold">📖 Agregar una nueva Categoria</h2>
    <form action="{{ route('categoria.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-floating mb-3">
        <label for="titulo">Nombre</label>
        <input type="text" class="form-control" id="titulo" name="nombre" placeholder="Nombre de la categoria">
      </div>
      <div class="d-flex justify-content-between">
        <a href="{{ route('categoria.index') }}" class="btn btn-secondary">
          <i class="fas fa-times"></i> Cancelar
        </a>
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-check"></i> Crear Categoria
        </button>
      </div>
    </form>
  </div>
</div>
@endsection