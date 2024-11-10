<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de clases</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .maergencostado {
            margin-left: 20px;
            margin-right: 20px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <a class="maergencostado" class="navbar-brand" href="/home">Inicio</a>
        <div class="maergencostado">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Maestros
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/Maestroslist">Ver listado</a></li>
                    <li><a class="dropdown-item" href="/Maestros">Agregar</a></li>
                </ul>
            </div>
        </div>
        <div class="maergencostado">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Materias
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/Materias">Ver listado</a></li>
                    <li><a class="dropdown-item" href="/AgregarMaterias">Agregar</a></li>
                </ul>
            </div>
        </div>
</nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>