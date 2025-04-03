<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Experiencia') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="POST" action="{{ route('experiencia.update', $experiencia->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH') <!-- Método PUT para la actualización -->

                <!-- Empresa -->
                <div class="mt-4">
                    <x-input-label for="empresa" :value="__('Empresa')" />
                    <x-text-input id="empresa" name="empresa" type="text" :value="old('empresa', $experiencia->empresa)" class="mt-1 block w-full" />
                </div>

                <!-- Puesto -->
                <div class="mt-4">
                    <x-input-label for="puesto" :value="__('Puesto')" />
                    <x-text-input id="puesto" name="puesto" type="text" :value="old('puesto', $experiencia->puesto)" class="mt-1 block w-full" />
                </div>

                <!-- Descripción -->
                <div class="mt-4">
                    <x-input-label for="descripcion" :value="__('Descripción')" />
                    <x-text-input id="descripcion" name="descripcion" type="text" :value="old('descripcion', $experiencia->descripcion)" class="mt-1 block w-full" />
                </div>

                <!-- Fecha de Inicio -->
                <div class="mt-4">
                    <x-input-label for="fecha_inicio" :value="__('Fecha de Inicio')" />
                    <x-text-input id="fecha_inicio" name="fecha_inicio" type="date" :value="old('fecha_inicio', \Carbon\Carbon::parse($experiencia->fecha_inicio)->format('Y-m-d'))" class="mt-1 block w-full" />
                </div>

                <!-- Fecha de Fin -->
                <div class="mt-4">
                    <x-input-label for="fecha_fin" :value="__('Fecha de Fin')" />
                    <x-text-input id="fecha_fin" name="fecha_fin" type="date" :value="old('fecha_fin', \Carbon\Carbon::parse($experiencia->fecha_fin)->format('Y-m-d'))" class="mt-1 block w-full" />
                </div>

                <!-- Botón de guardar -->
                <div class="mt-6">
                    <x-primary-button>
                        {{ __('Guardar') }}
                    </x-primary-button>
                </div>
            </form>

            <div>
                <x-primary-button class="bg-blue-500 hover:bg-blue-600">
                    <a href="{{ route('dashboard') }}" class="text-white">
                        ← Volver
                    </a>
                </x-primary-button>
            </div>
        </div>
    </div>
</x-app-layout>