@extends('app')
<!-- VISTA PARA CREAR LA CATEGORIA -->
@section('content')
<div class="container mt-5">
  <div class="card shadow-lg p-4 bg-white rounded">
    <h2 class="mb-4 text-primary text-center fw-bold">📖 Agregar Un Nuevo Proveedor</h2>
    <form action="{{ route('proveedores.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-floating mb-3">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del proveedor">
        <label for="correo_contacto">Correo Electronico</label>
        <input type="text" class="form-control" id="correo_contacto" name="correo_contacto" placeholder="Escribe tu correo de contacto">
        <label for="telefono">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Escribe tu telefono">
      </div>
      <div class="d-flex justify-content-between">
        <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">
          <i class="fas fa-times"></i> Cancelar
        </a>
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-check"></i> Crear Proveedor
        </button>
      </div>
    </form>
  </div>
</div>
@endsection