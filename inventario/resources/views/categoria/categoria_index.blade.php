@extends('app')

@section('title', 'Gestión de Categorias')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">📚 Gestión de Categorias</h2>
        <a href="{{ route('categoria.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Agregar Nueva Categoria
        </a>
    </div>
    <div class="table-responsive shadow-lg p-3 bg-white rounded">
        <table class="table table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categoria as $categori)
                <tr>
                    <td class="fw-semibold">{{ $categori->nombre }}</td>
                    <td class="text-center">
                        <a href="{{route('categoria.edit',$categori->id)}}" class="btn btn-warning btn-sm">Editar</a>
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-danger btn-sm" href="{{route('categoria.destroy',$categori->id)}}">Eliminar</button>
                    </td>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-4">
            {{ $categoria->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection