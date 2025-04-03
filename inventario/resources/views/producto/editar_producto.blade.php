@extends('app')

@section('content')
<div class="container mt-5">
  <div class="card shadow-lg p-4 bg-white rounded">
    <h2 class="mb-4 text-primary text-center fw-bold">📖 Editar un Producto</h2>
    <form action="{{ route('producto.update', $producto->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method("PUT")

      <div class="form-floating mb-3">
        <label for="titulo">Nombre del Producto</label>
        <input type="text" class="form-control" id="titulo" name="nombre" value="{{ $producto->nombre }}">
      </div>

      <div class="form-floating mb-3">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripción">{{ $producto->descripcion }}</textarea>

      </div>
      <div class="form-floating mb-3">
        <label for="descripcion">Precio</label>
        <input type="number" class="form-control" id="descripcion" name="precio" rows="3" value="{{ $producto->precio }}"></input>
      </div>
      <div class="form-floating mb-3">
        <label for="descripcion">Cantidad</label>
        <input type="number" class="form-control" id="descripcion" name="precio" rows="3" value="{{ $producto->cantidad }}"></input>
      </div>
      <div class="mb-3">
        <label for="autor_id" class="form-label fw-semibold">Categoria</label>
        <select class="form-select" id="autor_id" name="categoria_id">
          @foreach ($categoria as $cat)
          <option value="{{ $cat->id }}" {{ $cat->id == $producto->categoria_id ? 'selected' : '' }}>
            {{ $cat->nombre }}
          </option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="genero_id" class="form-label fw-semibold">Proveedor</label>
        <select class="form-select" id="genero_id" name="proveedor_id">
          @foreach ($proveedores as $proveedor)
          <option value="{{ $proveedor->id }}" {{ $proveedor->id == $producto->proveedor_id ? 'selected' : '' }}>
            {{ $proveedor->nombre }}
          </option>
          @endforeach
        </select>
      </div>

      <div class="d-flex justify-content-between">
        <a href="{{ route('producto.index') }}" class="btn btn-secondary">
          <i class="fas fa-times"></i> Cancelar
        </a>
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-check"></i> Editar Producto
        </button>
      </div>
    </form>
  </div>
</div>

@endsection