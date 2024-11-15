<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Materia</title>
    <style>
        .tabla{
            width: 50%; /* O el tamaño que desees */
            margin: 0 auto;
            margin-top: 5%
        }
    </style>
</head>
<body>
    @include('layouts/home')

    <div class="tabla">
        <form action="{{route('materia.update')}}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="hidden" name="id" value="{{ old('id', $materias->id) }}">
                <label for="exampleInputPassword1" class="form-label">Ingresa los datos a editar:</label>
                <br><label for="">Nombre:</label>
                <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">1</span>
                        <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $materias->nombre) }}"  placeholder="{{ $materias-> nombre }}" aria-describedby="basic-addon1">
                    </div>
            </div>
            <div class="mb-3">
                <label for="">Descripcion:</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">2</span>
                    <input type="text" class="form-control" name="descripcion" value="{{ old('nombre', $materias->descripcion) }}" placeholder="{{ $materias-> descripcion }}" aria-describedby="basic-addon1">
                </div>
            </div>
            <label for="">Cuatrimestre:</label>
                
            <div class="input-group mb-3">
                
                <label class="input-group-text" for="inputGroupSelect01">3</label>
                    <select class="form-select" id="inputGroupSelect01" name="cuatrimestre">
                        <option selected >{{ $materias-> cuatrimestre }}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
            </div>
            <button type="Agregar" class="btn btn-primary">Editar</button>
        </form>
    </div>
    
</body>
</html>