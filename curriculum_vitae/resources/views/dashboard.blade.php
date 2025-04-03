<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CV') }} de {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Información de {{ Auth::user()->name }}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="mb-4">
                            <strong>Email:</strong> {{ Auth::user()->email }}
                        </div>
                        <div class="mb-4">
                            <strong>Profesión:</strong> {{ Auth::user()->perfil->profesion ?? '' }}
                        </div>
                        <div class="mb-4">
                            <strong>Teléfono:</strong> {{ Auth::user()->perfil->telefono ?? '' }}
                        </div>
                        <div class="mb-4">
                            <strong>Sobre mí:</strong> {{ Auth::user()->perfil->sobre_mi ?? '' }}
                        </div>
                        <div class="mb-4">
                            <strong>Sitio Web:</strong>
                            @if(Auth::user()->perfil->sitio_web)
                            <a href="{{ Auth::user()->perfil->sitio_web }}" class="text-blue-500 underline" target="_blank">
                                {{ Auth::user()->perfil->sitio_web }}
                            </a>
                            @else
                            ""
                            @endif
                        </div>
                        <div class="mb-4">
                            <strong>LinkedIn:</strong>
                            @if(Auth::user()->perfil->linkedin)
                            <a href="{{ Auth::user()->perfil->linkedin }}" class="text-blue-500 underline" target="_blank">
                                {{ Auth::user()->perfil->linkedin }}
                            </a>
                            @else
                            ""
                            @endif
                        </div>
                        <div class="mb-4">
                            <strong>GitHub:</strong>
                            @if(Auth::user()->perfil->github)
                            <a href="{{ Auth::user()->perfil->github }}" class="text-blue-500 underline" target="_blank">
                                {{ Auth::user()->perfil->github }}
                            </a>
                            @else
                            ""
                            @endif
                        </div>
                    </div>
                    <!-- Botón para editar perfil -->
                    <div class="mt-4">
                        <x-primary-button class="bg-blue-500 hover:bg-blue-600">
                            <a href="{{ route('profile.edit') }}" class="text-white">
                                Editar
                            </a>
                        </x-primary-button>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Educación de {{ Auth::user()->name }} </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($formacion as $forma)
                        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 ease-in-out mb-6">
                            <div class="mb-4">
                                <strong>Institución:</strong> {{ $forma->institucion }}
                            </div>
                            <div class="mb-4">
                                <strong>Título:</strong> {{ $forma->titulo_obtenido }}
                            </div>
                            <div class="mb-4">
                                <strong>Fecha de Inicio:</strong> {{ \Carbon\Carbon::parse($forma->fecha_inicio)->format('d/m/Y') }}
                            </div>
                            <div class="mb-4">
                                <strong>Fecha de Fin:</strong>
                                @if ($forma->fecha_fin)
                                {{ \Carbon\Carbon::parse($forma->fecha_fin)->format('d/m/Y') }}
                                @else
                                Actualmente trabajando
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Botón para editar perfil -->
                    <div class="mt-4">
                        <x-primary-button class="bg-blue-500 hover:bg-blue-600">
                            <a href="{{ route('formacion.edit',$forma->id) }}" class="text-white">
                                Editar
                            </a>
                        </x-primary-button>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Proyectos de {{ Auth::user()->name }} </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($proyecto as $proyect)
                        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 ease-in-out mb-6">
                            <div class="mb-4">
                                <strong>Título:</strong> {{ $proyect->titulo }}
                            </div>
                            <div class="mb-4">
                                <strong>Descripción:</strong> {{ $proyect->descripcion }}
                            </div>
                            <div class="mb-4">
                                <strong>Enlace:</strong> <a href="{{ $proyect->enlace_proyecto }}" target="_blank" class="text-blue-600 underline"> {{ $proyect->enlace_proyecto }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Botón para editar perfil -->
                    <div class="mt-4">
                        <x-primary-button class="bg-blue-500 hover:bg-blue-600">
                            <a href="{{ route('proyecto.edit',$proyect->id) }}" class="text-white">
                                Editar
                            </a>
                        </x-primary-button>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Habilidades de {{ Auth::user()->name }} </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($habilidades as $habilid)
                        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 ease-in-out mb-6">
                            <div class="mb-4">
                                <strong>Nombre de la habilidad :</strong> {{ $habilid->nombre_habilidad }}
                            </div>
                            <div class="mb-4">
                                <strong>Nivel :</strong> {{ $habilid->nivel }}
                            </div>

                        </div>
                        @endforeach
                    </div>

                    <!-- Botón para editar perfil -->
                    <div class="mt-4">
                        <x-primary-button class="bg-blue-500 hover:bg-blue-600">
                            <a href="{{ route('habilidad.edit',$habilid->id) }}" class="text-white">
                                Editar
                            </a>
                        </x-primary-button>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Experiencias de {{ Auth::user()->name }} </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($experiencia as $exp)
                        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 ease-in-out mb-6">
                            <div class="mb-4">
                                <strong>Empresa:</strong> {{ $exp->empresa }}
                            </div>
                            <div class="mb-4">
                                <strong>Puesto:</strong> {{ $exp->puesto }}
                            </div>
                            <div class="mb-4">
                                <strong>Fecha de Inicio:</strong> {{ \Carbon\Carbon::parse($exp->fecha_inicio)->format('d/m/Y') }}
                            </div>
                            <div class="mb-4">
                                <strong>Fecha de Fin:</strong>
                                @if ($exp->fecha_fin)
                                {{ \Carbon\Carbon::parse($exp->fecha_fin)->format('d/m/Y') }}
                                @else
                                Actualmente trabajando
                                @endif
                            </div>
                            <!-- Botón para editar perfil -->
                            <div class="mt-4">
                                <x-primary-button class="bg-blue-500 hover:bg-blue-600">
                                    <a href="{{ route('experiencia.edit', $exp->id) }}" class="text-white">
                                        Editar
                                    </a>
                                </x-primary-button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>