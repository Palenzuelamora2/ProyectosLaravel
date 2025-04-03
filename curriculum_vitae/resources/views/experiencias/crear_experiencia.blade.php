<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Experiencia') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="POST" action="{{ route('experiencia.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- Empresa -->
                <div class="mt-4">
                    <x-input-label for="empresa" :value="__('Empresa')" />
                    <x-text-input id="empresa" name="empresa" type="text" class="mt-1 block w-full" />
                </div>

                <!-- Puesto -->
                <div class="mt-4">
                    <x-input-label for="puesto" :value="__('Puesto')" />
                    <x-text-input id="puesto" name="puesto" type="text" class="mt-1 block w-full" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Descripcion -->
                <div class="mt-4">
                    <x-input-label for="descripcion" :value="__('Descripcion')" />
                    <x-text-input id="descripcion" name="descripcion" type="text" class="mt-1 block w-full" />
                </div>
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