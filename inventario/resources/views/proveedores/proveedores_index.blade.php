@extends('app')

@section('title', 'Gestión de Proveedores')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">📚 Gestión de Proveedores</h2>
        <a href="{{ route('proveedores.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Agregar Nuevo Proveedor
        </a>
    </div>
    <div class="table-responsive shadow-lg p-3 bg-white rounded">
        <table class="table table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo de Contacto</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedor as $prov)
                <tr>
                    <td class="fw-semibold">{{ $prov->nombre }}</td>
                    <td class="fw-semibold">{{ $prov->correo_contacto }}</td>
                    <td class="fw-semibold">{{ $prov->telefono }}</td>
                    <td class="text-center">
                        <a href="{{route('proveedores.edit',$prov->id)}}" class="btn btn-warning btn-sm">Editar</a>
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-danger btn-sm" href="{{route('proveedores.destroy',$prov->id)}}">Eliminar</button>
                    </td>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-4">
            {{ $proveedor->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection