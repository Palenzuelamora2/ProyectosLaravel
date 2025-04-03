@extends('app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4 bg-white rounded">
        <h2 class="mb-4 text-primary text-center fw-bold"> {{ $producto->nombre }}</h2>
        <form action="{{ route('producto.show', $producto->id) }}" method="post" enctype="multipart/form-data">
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
            <div class="form-floating mb-3">
                <label for="descripcion">Categoria</label>
                <input type="text" class="form-control" id="descripcion" name="categoria_id" rows="3" value="{{ $producto->categoria->nombre }}"></input>

            </div>
            <div class="form-floating mb-3">
                <label for="descripcion">Proveedor</label>
                <input type="text" class="form-control" id="descripcion" name="proveedor_id" rows="3" value="{{ $producto->proveedore->nombre }}"></input>

            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('producto.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Volver Atras
                </a>
            </div>
        </form>
    </div>
</div>

@endsection