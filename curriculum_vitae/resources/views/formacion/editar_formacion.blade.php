<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Formación') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="POST" action="{{ route('formacion.update', $formacion->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH') <!-- Método PUT para la actualización -->

                <!-- Empresa -->
                <div class="mt-4">
                    <x-input-label for="institucion" :value="__('Institucion')" />
                    <x-text-input id="institucion" name="institucion" type="text" :value="old('institucion', $formacion->institucion)" class="mt-1 block w-full" />
                </div>

                <!-- Puesto -->
                <div class="mt-4">
                    <x-input-label for="titulo_obtenido" :value="__('Titulo')" />
                    <x-text-input id="titulo" name="titulo_obtenido" type="text" :value="old('titulo_obtenido', $formacion->titulo_obtenido)" class="mt-1 block w-full" />
                </div>

                <!-- Descripción -->

                <!-- Fecha de Inicio -->
                <div class="mt-4">
                    <x-input-label for="fecha_inicio" :value="__('Fecha de Inicio')" />
                    <x-text-input id="fecha_inicio" name="fecha_inicio" type="date" :value="old('fecha_inicio', \Carbon\Carbon::parse($formacion->fecha_inicio)->format('Y-m-d'))" class="mt-1 block w-full" />
                </div>

                <!-- Fecha de Fin -->
                <div class="mt-4">
                    <x-input-label for="fecha_fin" :value="__('Fecha de Fin')" />
                    <x-text-input id="fecha_fin" name="fecha_fin" type="date" :value="old('fecha_fin', \Carbon\Carbon::parse($formacion->fecha_fin)->format('Y-m-d'))" class="mt-1 block w-full" />
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