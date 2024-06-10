@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Torneo {{ $torneo->nombre }}</h1>
        <form action="{{ route('torneos.update', $torneo) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ $torneo->imagen ?? \App\Models\Torneo::$IMAGE_DEFAULT }}"
                         alt="{{ $torneo->nombre }}" class="img-fluid">
                    <div class="mt-3">
                        <label for="imagen">Cambiar Imagen</label>
                        <input type="file" class="form-control-file" id="imagen" name="imagen">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $torneo->nombre }}"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="modalidad">Modalidad</label>
                        <input type="text" class="form-control" id="modalidad" name="modalidad"
                               value="{{ $torneo->modalidad }}" required>
                    </div>
                    <div class="form-group">
                        <label for="superficie">Superficie</label>
                        <input type="text" class="form-control" id="superficie" name="superficie"
                               value="{{ $torneo->superficie }}" required>
                    </div>
                    <div class="form-group">
                        <label for="vacantes">Vacantes</label>
                        <input type="number" class="form-control" id="vacantes" name="vacantes"
                               value="{{ $torneo->vacantes }}" required>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoría</label>
                        <input type="text" class="form-control" id="categoria" name="categoria"
                               value="{{ $torneo->categoria }}" required>
                    </div>
                    <div class="form-group">
                        <label for="premios">Premios</label>
                        <input type="number" class="form-control" id="premios" name="premios"
                               value="{{ $torneo->premios }}" required>
                    </div>
                    <div class="form-group">
                        <label for="fechaInicio">Fecha de inicio</label>
                        <input type="date" class="form-control" id="fechaInicio" name="fechaInicio"
                               value="{{ $torneo->fechaInicio }}" required>
                    </div>
                    <div class="form-group">
                        <label for="fechaFin">Fecha de fin</label>
                        <input type="date" class="form-control" id="fechaFin" name="fechaFin"
                               value="{{ $torneo->fechaFin }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('imagen').addEventListener('change', function (event) {
            var input = event.target;
            var file = input.files[0];
            var reader = new FileReader();

            reader.onload = function () {
                // Actualizamos la URL de la imagen actual
                var image = document.querySelector('.img-fluid');
                image.src = reader.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        });

    </script>
@endsection
