<!-- VISTA PARA MOSTRAR LOS PRODUCTOS -->
@extends('app')

@section('title', 'Gestión de Producto')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">📚 Gestión de Productos</h2>
        <a href="{{ route('producto.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Agregar Producto
        </a>
    </div>

    <div class="table-responsive shadow-lg p-3 bg-white rounded">
        <table class="table table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <td class="fw-semibold">{{ $producto->nombre }}</td>
                    <td>{{ $producto->categoria->nombre }}</td>
                    <td>{{ $producto->proveedore->nombre }}</td>
                    <td>{{ Str::limit($producto->descripcion, 80, '...') }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->cantidad }}</td>
                    <td class="text-center">
                        <a href="{{route('producto.show',$producto->id)}}" class="btn btn-info btn-sm">Mostrar Producto</a>
                        <a href="{{route('producto.edit',$producto->id)}}" class="btn btn-warning btn-sm">Editar</a>
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-danger btn-sm" href="{{route('producto.destroy',$producto->id)}}">Eliminar</button>
                    </td>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-4">
            {{ $productos->links('pagination::bootstrap-5') }}
        </div>

    </div>
</div>
@endsection