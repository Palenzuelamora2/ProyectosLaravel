@extends('app')
<!-- VISTA PARA CREAR LA CATEGORIA -->
@section('content')
<div class="container mt-5">
  <div class="card shadow-lg p-4 bg-white rounded">
    <h2 class="mb-4 text-primary text-center fw-bold">📖 Editar Proveedor</h2>
    <form action="{{ route('proveedores.update',$prov->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method("PUT")
      <div class="form-floating mb-3">
        <label for="titulo">Nombre</label>
        <input type="text" class="form-control" id="titulo" name="nombre" placeholder="Nombre de la categoria" value="{{ $prov->nombre }}">
        <label for="titulo">Correo Electronico</label>
        <input type="text" class="form-control" id="titulo" name="correo_contacto" placeholder="Nombre de la categoria" value="{{ $prov->correo_contacto }}" readonly>
        <label for="titulo">Telefono</label>
        <input type="text" class="form-control" id="titulo" name="telefono" placeholder="Nombre de la categoria" value="{{ $prov->telefono }}" readonly>
        
      </div>
      <div class="d-flex justify-content-between">
        <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">
          <i class="fas fa-times"></i> Cancelar
        </a>
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-check"></i> Editar Categoria
        </button>
      </div>
    </form>
  </div>
</div>
@endsection