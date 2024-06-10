@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Torneo</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('torneos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            </div>

            <div class="form-group">
                <label for="modalidad">Modalidad:</label>
                <input type="text" class="form-control" id="modalidad" name="modalidad" value="{{ old('modalidad') }}"
                       required>
            </div>

            <div class="form-group">
                <label for="superficie">Superficie:</label>
                <input type="text" class="form-control" id="superficie" name="superficie"
                       value="{{ old('superficie') }}" required>
            </div>

            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <input type="text" class="form-control" id="categoria" name="categoria"
                       value="{{ old('categoria') }}" required>
            </div>

            <div class="form-group">
                <label for="premios">Premios:</label>
                <input type="number" class="form-control" id="premios" name="premios"
                       value="{{ old('premios') }}" required>
            </div>

            <div class="form-group">
                <label for="fechaInicio">Fecha de inicio:</label>
                <input type="date" class="form-control" id="fechaInicio" name="fechaInicio"
                       value="{{ old('fechaInicio') }}" required>
            </div>

            <div class="form-group">
                <label for="fechaFin">Fecha de fin:</label>
                <input type="date" class="form-control" id="fechaFin" name="fechaFin"
                       value="{{ old('fechaFin') }}" required>
            </div>

            <div class="form-group">
                <label for="vacantes">Vacantes:</label>
                <input type="number" class="form-control" id="vacantes" name="vacantes" value="{{ old('vacantes') }}"
                       required>
            </div>
            
            <div class="form-group">
                <label for="imagen">Imagen (opcional):</label>
                <input type="file" class="form-control-file" id="imagen" name="imagen" accept="image/*">
                <small class="form-text text-muted">Si no se selecciona ninguna imagen, se usará la imagen por
                    defecto.</small>
            </div>

            <button type="submit" class="btn btn-primary">Crear Torneo</button>
        </form>
    </div>
@endsection
