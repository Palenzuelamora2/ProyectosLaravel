<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Habilidad') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="POST" action="{{ route('habilidad.update',$habilidad->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH') <!-- Método PUT para la actualización -->

                <!-- Habilidad -->
                <div class="mt-4">
                    <x-input-label for="nombre_habilidad" :value="__('Habilidad')" />
                    <x-text-input id="nombre_habilidad" name="nombre_habilidad" type="text" class="mt-1 block w-full" :value="old('habilidad', $habilidad->nombre_habilidad)" />
                </div>

                <!-- Puesto -->
                <div class="mt-4">
                    <x-input-label for="nivel" :value="__('Nivel')" />
                    <select id="nivel" name="nivel" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option :value="('habilidad', $habilidad->nivel)" disabled selected>{{ $habilidad->nivel }}
                </div>
                </option>
                <option value="Basico">Basico</option>
                <option value="Intermedio">Intermedio</option>
                <option value="Avanzado">Avanzado</option>
                <option value="Experto">Experto</option>
                </select>
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