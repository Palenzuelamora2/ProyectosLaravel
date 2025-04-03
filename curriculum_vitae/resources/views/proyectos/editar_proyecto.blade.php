<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Proyecto') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="POST" action="{{ route('proyecto.update',$proyecto->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH') <!-- Método PUT para la actualización -->

                <!-- Habilidad -->
                <div class="mt-4">
                    <x-input-label for="Titulo" :value="__('Titulo')" />
                    <x-text-input id="titulo" name="titulo" type="text" class="mt-1 block w-full" :value="old('titulo', $proyecto->titulo)" />
                </div>

                <!-- Puesto -->
                <div class="mt-4">
                    <x-input-label for="descripcion" :value="__('Descripción')" />
                    <x-text-input id="descripcion" name="descripcion" type="text" :value="old('descripcion', $proyecto->descripcion)" class="mt-1 block w-full" />
                </div>
                <div class="mt-4">
                    <x-input-label for="enlace" :value="__('Enlace')" />
                    <x-text-input id="enlace" name="enlace_proyecto" type="text" :value="old('enlace_proyecto', $proyecto->enlace_proyecto)" class="mt-1 block w-full" />
                </div>
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
    </div>
</x-app-layout>