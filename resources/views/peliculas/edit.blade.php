<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Película</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Película</h2>
    <form action="{{ route('peliculas.update', $pelicula->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $pelicula->titulo }}">
        </div>
        <div class="form-group">
            <label for="año">Año:</label>
            <input type="text" class="form-control" id="año" name="año" value="{{ $pelicula->año }}">
        </div>
        <div class="form-group">
            <label for="director">Director:</label>
            <input type="text" class="form-control" id="director" name="director" value="{{ $pelicula->director }}">
        </div>
        <div class="form-group">
            <label for="sinopsis">Sinopsis:</label>
            <textarea class="form-control" id="sinopsis" name="sinopsis">{{ $pelicula->sinopsis }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
