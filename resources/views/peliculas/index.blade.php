<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Películas</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 800px;
        }
        .btn-create {
            margin-bottom: 20px;
        }
        .movie-title {
            margin-bottom: 5px;
        }
        .movie-info {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Lista de Películas</h2>
        <!-- Botón "Crear Película" -->
        <a href="{{ route('peliculas.create') }}" class="btn btn-success btn-create">Crear Película</a>
        <!-- Alerta de éxito -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <!-- Alerta de error -->
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <ul class="list-group">
            @foreach ($peliculas as $pelicula)
                <li class="list-group-item">
                    <h3 class="movie-title">{{ $pelicula->titulo }}</h3>
                    <p class="movie-info"><strong>Año:</strong> {{ $pelicula->año }}</p>
                    <p class="movie-info"><strong>Director:</strong> {{ $pelicula->director }}</p>
                    <p class="movie-info"><strong>Sinopsis:</strong> {{ $pelicula->sinopsis }}</p>
                    <div class="btn-group" role="group" aria-label="Acciones">
                        <a href="{{ route('peliculas.edit', $pelicula->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('peliculas.destroy', $pelicula->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
