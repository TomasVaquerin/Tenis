@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Tenista</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tenistas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido') }}"
                       required>
            </div>

            <div class="form-group">
                <label for="ranking">Ranking:</label>
                <input type="number" class="form-control" id="ranking" name="ranking" value="{{ old('ranking') }}"
                       required>
            </div>

            <div class="form-group">
                <label for="pais">País:</label>
                <input type="text" class="form-control" id="pais" name="pais" value="{{ old('pais') }}" required>
            </div>

            <div class="form-group">
                <label for="FechaNacimiento">Fecha de Nacimiento:</label>
                <div class="input-group">
                    <input type="date" class="form-control" id="FechaNacimiento" name="FechaNacimiento"
                           value="{{ old('FechaNacimiento') }}" required>
                    <div class="input-group-append">
                        <span class="input-group-text">Edad: <span id="edad" class="ml-2"></span></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" class="form-control" id="edad" name="edad" value="{{ old('edad') }}" required>
            </div>

            <div class="form-group">
                <label for="Altura">Altura:</label>
                <input type="number" class="form-control" id="Altura" name="Altura" value="{{ old('Altura') }}"
                       required>
            </div>

            <div class="form-group">
                <label for="peso">Peso:</label>
                <input type="number" class="form-control" id="peso" name="peso" value="{{ old('peso') }}" required>
            </div>

            <div class="form-group">
                <label for="Mano">Mano:</label>
                <input type="text" class="form-control" id="Mano" name="Mano" value="{{ old('Mano') }}" required>
            </div>

            <div class="form-group">
                <label for="reves">Revés:</label>
                <input type="text" class="form-control" id="reves" name="reves" value="{{ old('reves') }}" required>
            </div>

            <div class="form-group">
                <label for="entrenador">Entrenador:</label>
                <input type="text" class="form-control" id="entrenador" name="entrenador"
                       value="{{ old('entrenador') }}" required>
            </div>

            <div class="form-group">
                <label for="totalDineroGanado">Total Dinero Ganado:</label>
                <input type="number" class="form-control" id="totalDineroGanado" name="totalDineroGanado"
                       value="{{ old('totalDineroGanado') }}" required>
            </div>

            <div class="form-group">
                <label for="numeroVictorias">Número de Victorias:</label>
                <input type="number" class="form-control" id="numeroVictorias" name="numeroVictorias"
                       value="{{ old('numeroVictorias') }}" required>
            </div>

            <div class="form-group">
                <label for="numeroDerrotas">Número de Derrotas:</label>
                <input type="number" class="form-control" id="numeroDerrotas" name="numeroDerrotas"
                       value="{{ old('numeroDerrotas') }}" required>
            </div>

            <div class="form-group">
                <label for="imagen">Imagen (opcional):</label>
                <input type="file" class="form-control-file" id="imagen" name="imagen" accept="image/*">
                <small class="form-text text-muted">Si no se selecciona ninguna imagen, se usará la imagen por
                    defecto.</small>
            </div>

            <div class="form-group">
                <label for="puntos">Puntos:</label>
                <input type="number" class="form-control" id="puntos" name="puntos" value="{{ old('puntos') }}"
                       required>
            </div>

            <button type="submit" class="btn btn-primary">Crear Tenista</button>
        </form>
    </div>
@endsection
