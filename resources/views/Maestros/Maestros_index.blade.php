<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maestros inicio</title>

    <style>
        .tabla{
            width: 50%; /* O el tamaño que desees */
            margin: 0 auto;
            margin-top: 5%
        }
    </style>

</head>

<body>
    <!-- Incluir el navbar -->
    @include('layouts/home')

    <div class="tabla">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Tel</th>
                    <th scope="col">Materias que trabaja</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($maestros as $maestro)
                <tr>
                    <td>{{ $maestro->id }} </td>
                    <td>{{ $maestro->nombre }} </td>
                    <td>{{ $maestro->apellido }}</td>
                    <td>{{ $maestro->edad }}</td>
                    <td>{{ $maestro->genero }}</td>
                    <td>{{ $maestro->tel }}</td>
                    <td>
                        @if ($maestro->materias->isNotEmpty())
                            <ul>
                                @foreach ($maestro->materias as $materia)
                                    <li>{{ $materia->nombre }}</li>
                                @endforeach
                            </ul>
                        @else
                            <em>No tiene materias asignadas</em>
                        @endif
                    </td>
                    <td><a role="button" aria-disabled="true" class="btn btn-warning" href="/verMaestro/{{ $maestro->id }}">Editar</a><br><br>
                        <form action="{{ route('maestro.destroy', $maestro->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('POST') <!-- Este es el método que utilizas, en este caso POST -->
                        
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            
        </table>
    </div>

</body>
</html>