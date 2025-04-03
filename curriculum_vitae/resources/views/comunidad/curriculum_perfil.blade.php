<x-app-layout>

    <style>
        /* Estilos generales */
        body {
            font-family: 'Helvetica Neue', sans-serif;
            /* Tipografía moderna y limpia */
            background: linear-gradient(135deg, #e0eaf0, #f5f7fa);
            /* Gradiente suave de azul pastel a gris claro */
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Contenedor principal */
        .py-12 {
            padding: 4rem 0;
            background: #f5f7fa;
            /* Fondo de color gris suave para dar continuidad al gradiente */
        }

        /* Contenedor principal */
        .max-w-7xl {
            max-width: 1280px;
        }

        /* Estilos de la estructura en dos columnas */
        .content-container {
            display: flex;
            justify-content: space-between;
            gap: 2.5rem;
            margin-top: 2rem;
        }

        /* Columna de Información de Perfil */
        .profile-info {
            flex: 1;
            background-color: #ffffff;
            padding: 2.5rem;
            border-radius: 15px;
            max-height: 600px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-left: 8px solid #6cb2eb;
            /* Borde izquierdo azul suave */
        }

        .profile-info:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .profile-info h3 {
            font-size: 2rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 1.5rem;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* Sección de texto */
        .profile-info div {
            margin-bottom: 1.5rem;
            font-size: 1rem;
            line-height: 1.6;
        }

        .profile-info .text-blue-500 {
            color: #3182ce;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .profile-info .text-blue-500:hover {
            color: #ff5722;
            /* Cambia a un color suave al pasar el ratón */
        }

        /* Columna de secciones (Educación, Proyectos, Habilidades, etc.) */
        .right-column {
            flex: 2;
            background-color: #ffffff;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-left: 8px solid #6cb2eb;
            /* Borde izquierdo azul suave */
        }

        .right-column:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .right-column h3 {
            font-size: 2rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
        }

        /* Estilo de las tarjetas */
        .card {
            background-color: #ffffff;
            padding: 1.75rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .card .mb-4 {
            margin-bottom: 1.25rem;
        }

        .card .text-blue-600 {
            color: #3182ce;
        }

        /* Botón de editar */
        .edit-button {
            background-color: #6cb2eb;
            /* Color suave azul */
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 10px;
            font-weight: 600;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: none;
            margin-top: 2rem;
            letter-spacing: 1px;
        }

        .edit-button:hover {
            background-color: #3b82f6;
            /* Cambio a un azul más oscuro al pasar el ratón */
        }

        /* Estilo de los enlaces */
        a {
            color: inherit;
            text-decoration: none;
            transition: color 0.3s ease, transform 0.3s ease;
            position: relative;
        }

        /* Efecto al pasar el cursor sobre los enlaces */
        a:hover {
            color: #6cb2eb;
            /* Azul suave */
            transform: translateY(-2px);
        }

        /* Línea debajo del enlace en hover */
        a:hover::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 3px;
            bottom: -5px;
            left: 0;
            background-color: #6cb2eb;
            border-radius: 2px;
        }

        /* Responsividad */
        @media (max-width: 768px) {
            .content-container {
                flex-direction: column;
            }

            .profile-info,
            .right-column {
                flex: 1;
                margin-bottom: 2rem;
            }
        }
    </style>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="content-container">
                <!-- Columna de Información de Perfil -->
                <div class="profile-info">
                
                    <h3>Información de {{$perfil->nombre_completo}}</h3>
                    <div class="mb-4">
                        <strong>Email:</strong> {{$perfil->correo_electronico }}
                    </div>
                    <div class="mb-4">
                        <strong>Profesión:</strong> {{$perfil->profesion ?? '' }}
                    </div>
                    <div class="mb-4">
                        <strong>Teléfono:</strong> {{ $perfil->telefono ?? '' }}
                    </div>
                    <div class="mb-4">
                        <strong>Sobre mí:</strong> {{ $perfil->sobre_mi ?? '' }}
                    </div>
                    <div class="mb-4">
                        <strong>Sitio Web:</strong>
                        @if($perfil->sitio_web)
                        <a href="{{ $perfil->sitio_web }}" target="_blank">
                            {{$perfil->sitio_web }}
                        </a>
                        @else
                        ""
                        @endif
                    </div>
                    <div class="mb-4">
                        <strong>LinkedIn:</strong>
                        @if($perfil->linkedin)
                        <a href="{{ $perfil->linkedin }}" target="_blank">
                            {{ $perfil->linkedin }}
                        </a>
                        @else
                        ""
                        @endif
                    </div>
                    <div class="mb-4">
                        <strong>GitHub:</strong>
                        @if($perfil->github)
                        <a href="{{$perfil->github }}" target="_blank">
                            {{ $perfil->github }}
                        </a>
                        @else
                        ""
                        @endif
                    </div>
                </div>

                <!-- Columna de secciones (Educación, Proyectos, Habilidades) -->
                <div class="right-column">
                    <h3>Educación</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($formacion as $forma)
                        <div class="card">
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
                    <h3 class="mt-6">Proyectos</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($proyecto as $proyect)
                        <div class="card">
                            <div class="mb-4">
                                <strong>Título:</strong> {{ $proyect->titulo }}
                            </div>
                            <div class="mb-4">
                                <strong>Descripción:</strong> {{ $proyect->descripcion }}
                            </div>
                            <div class="mb-4">
                                <strong>Enlace:</strong> <a href="{{ $proyect->enlace_proyecto }}" target="_blank" class="text-blue-600"> {{ $proyect->enlace_proyecto }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <h3 class="mt-6">Habilidades</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($habilidades as $habilid)
                        <div class="card">
                            <div class="mb-4">
                                <strong>Nombre de la habilidad:</strong> {{ $habilid->nombre_habilidad }}
                            </div>
                            <div class="mb-4">
                                <strong>Nivel:</strong> {{ $habilid->nivel }}
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <h3 class="mt-6">Experiencia</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($experiencia as $exp)
                        <div class="card">
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
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>