<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Proyecto') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="POST" action="{{ route('proyecto.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- Titulo -->
                <div class="mt-4">
                    <x-input-label for="titulo" :value="__('Titulo')" />
                    <x-text-input id="titulo" name="titulo" type="text" class="mt-1 block w-full" />
                </div>

                <!-- Descripcion -->
                <div class="mt-4">
                    <x-input-label for="descripcion" :value="__('Descripcion')" />
                    <x-text-input id="descripcion" name="descripcion" type="text" class="mt-1 block w-full" />
                </div>

                <!-- Enlace -->
                <div class="mt-4">
                    <x-input-label for="enlace" :value="__('Enlace')" />
                    <x-text-input id="enlace" name="enlace_proyecto" type="url" class="mt-1 block w-full" />
                </div>

                <!-- Botones -->
                <div class="mt-6 flex space-x-4">
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