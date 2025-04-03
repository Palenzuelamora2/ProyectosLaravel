<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comunidad') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
            <div class="p-6 text-gray-900">
                <h3 class="text-lg font-semibold mb-4">Buscar Curriculums de la comunidad</h3>

                <form action="{{ route('perfil.buscar') }}" method="GET" class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 ease-in-out mb-6">
                            <input type="text" name="nombre" placeholder="Introducir un nombre" value="{{ request('nombre') }}">
                            <x-primary-button class="bg-blue-500 hover:bg-blue-600"> Buscar </x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if(isset($nombre))
    <div class="py-8 flex justify-center">
        <div class="bg-white shadow-md rounded-xl p-6 w-full max-w-lg">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">Resultados encontrados:</h3>
            <ul>
                @foreach($perfiles as $perfil)
                <li class="p-3 border-b border-gray-300">
                    <label for="">{{ $perfil->nombre_completo }}</label>
                    <x-primary-button>
                        <a href="{{ route('perfil.curriculum',$perfil->usuario_id) }}">Ver</a>
                    </x-primary-button>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @else
    <div class="py-8 flex justify-center">
        <div class="bg-white shadow-md rounded-xl p-6 w-full max-w-lg text-center">
            <p class="text-gray-500">No se encontraron resultados para "{{ request('nombre') }}"</p>
        </div>
    </div>
    @endif
</x-app-layout>