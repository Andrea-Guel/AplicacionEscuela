<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Maestro</title>
    <style>
        .tabla{
            width: 50%; /* O el tamaño que desees */
            margin: 0 auto;
            margin-top: 5%
        }
        .form{
            width: 50%; /* O el tamaño que desees */
            margin: 0 auto;
            margin-top: 3%
        }
    </style>
</head>

<body>
    <!-- Incluir el navbar -->
    @include('layouts/home')

    <div class="form">
        <form action="{{ route('maestro.update') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Edita los datos que quieras:</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">1</span>
                    <input type="hidden" name="id" value="{{ old('id', $maestros->id) }}">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{ old('id', $maestros->nombre) }}" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">2</span>
                    <input type="text" class="form-control" name="apellido" value="{{ old('id', $maestros->apellido) }}" placeholder="Apellido" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">3</span>
                    <input type="text" class="form-control" name="edad" placeholder="Edad" value="{{ old('id', $maestros->edad) }}" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="mb-3">
                <select class="form-select" name="genero" aria-label="Default select example">
                    <option selected>{{ old('id', $maestros->genero) }}</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Avion">Avion</option>
                </select>
            </div>
            <div class="mb-3">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">4</span>
                    <input type="text" class="form-control" name="tel" value="{{ old('id', $maestros->tel)}}" placeholder="Telefono" aria-describedby="basic-addon1">
                </div>
            </div>
        
            <div class="input-group mb-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Seleccione la materia a trabajar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>
                            @foreach ($materias1 as $materia)
                            <tr>
                                <td>
                                    <!-- Checkbox para seleccionar materias -->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="materias[]" value="{{ $materia->id }}" id="materia_{{ $materia->id }}">
                                        <label class="form-check-label" for="materia_{{ $materia->id }}">{{ $materia->nombre }}</label>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </td>
                    </tbody>
                </table>
            </div>
        
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>

    </div>
    
</body>
</html>