@extends('app')
<!-- VISTA PARA CREAR LA CATEGORIA -->
@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4 bg-white rounded">
        <h2 class="mb-4 text-primary text-center fw-bold">📖 Agregar Un Nuevo Producto</h2>
        <form action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Producto">
            </div>
            <div>
                <label for="correo_contacto">Descripcion</label>
                <input type="text" class="form-control" id="correo_contacto" name="descripcion">
            </div>
            <div>
                <label for="telefono">Precio</label>
                <input type="number" class="form-control" id="telefono" name="precio">
            </div>
            <div>
                <label for="telefono">Cantidad</label>
                <input type="number" class="form-control" id="telefono" name="cantidad">
            </div>
            <div class="mb-3">
                <label for="autor_id" class="form-label fw-semibold">Categoria</label>
                <select class="form-select" id="categoria_id" name="categoria_id">
                    <option value="">Seleccione una categoria</option>
                    @foreach ($categoria as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="autor_id" class="form-label fw-semibold">Proveedor</label>
                <select class="form-select" id="proveedor_id" name="proveedor_id">
                    <option value="">Seleccione un proveedor</option>
                    @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('producto.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check"></i> Crear Producto
                </button>
            </div>
        </form>
    </div>
</div>
@endsection