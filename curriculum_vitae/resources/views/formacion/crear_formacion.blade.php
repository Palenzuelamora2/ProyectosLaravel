<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Formacion') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="POST" action="{{ route('formacion.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- Instituto -->
                <div class="mt-4">
                    <x-input-label for="institucion" :value="__('Institucion')" />
                    <x-text-input id="institucion" name="institucion" type="text" class="mt-1 block w-full" />
                </div>

                <!-- Titulo -->
                <div class="mt-4">
                    <x-input-label for="titulo" :value="__('Titulo')" />
                    <x-text-input id="titulo" name="titulo_obtenido" type="text" class="mt-1 block w-full" />
                    
                </div>

                <!-- Fechas -->
                <div class="mt-4">
                    <x-input-label for="fecha_inicio" :value="__('Fecha de Inicio')" />
                    <x-text-input id="fecha_inicio" name="fecha_inicio" type="date" class="mt-1 block w-full" />
                </div>
                <div class="mt-4">
                    <x-input-label for="fecha_fin" :value="__('Fecha de Fin')" />
                    <x-text-input id="fecha_fin" name="fecha_fin" type="date" class="mt-1 block w-full" />
                </div>
                <!-- Botón de guardar -->
                <div class="mt-6">
                    <x-primary-button>
                        {{ __('Save') }}
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