<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Materias inicio</title>

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
                    <th scope="col">Descripcion</th>
                    <th scope="col">Cuatrimestre</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materias as $materia)
                <tr>
                    <th scope="row">{{ $materia->id }}</th>
                    <td>{{ $materia->nombre }}</td>
                    <td>{{ $materia->descripcion }}</td>
                    <td>{{ $materia->cuatrimestre }}</td>
                    <td><a role="button" aria-disabled="true" class="btn btn-warning" href="/verMateria/{{$materia->id}}">Editar</a><br><br>
                        <form action="{{ route('materia.destroy', $materia->id) }}" method="POST" style="display:inline;">
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