@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar perfil de {{ $tenista->nombre }} {{ $tenista->apellido }}</h1>
        <form action="{{ route('tenistas.update', $tenista) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ $tenista->imagen ?? \App\Models\Tenista::$IMAGE_DEFAULT }}"
                         alt="{{ $tenista->nombre }}" class="img-fluid">
                    <div class="mt-3">
                        <label for="imagen">Cambiar Imagen</label>
                        <input type="file" class="form-control-file" id="imagen" name="imagen">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $tenista->nombre }}"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido"
                               value="{{ $tenista->apellido }}" required>
                    </div>
                    <div class="form-group">
                        <label for="ranking">Ranking</label>
                        <input type="number" class="form-control" id="ranking" name="ranking"
                               value="{{ $tenista->ranking }}" required>
                    </div>
                    <div class="form-group">
                        <label for="pais">País</label>
                        <input type="text" class="form-control" id="pais" name="pais" value="{{ $tenista->pais }}"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="FechaNacimiento">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="FechaNacimiento" name="FechaNacimiento"
                               value="{{ $tenista->FechaNacimiento }}" required>
                    </div>
                    <div class="form-group">
                        <label for="Altura">Altura</label>
                        <input type="number" class="form-control" id="Altura" name="Altura"
                               value="{{ $tenista->Altura }}" required>
                    </div>
                    <div class="form-group">
                        <label for="peso">Peso</label>
                        <input type="number" class="form-control" id="peso" name="peso" value="{{ $tenista->peso }}"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="Mano">Mano</label>
                        <input type="text" class="form-control" id="Mano" name="Mano" value="{{ $tenista->Mano }}"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="reves">Revés</label>
                        <input type="text" class="form-control" id="reves" name="reves" value="{{ $tenista->reves }}"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="entrenador">Entrenador</label>
                        <input type="text" class="form-control" id="entrenador" name="entrenador"
                               value="{{ $tenista->entrenador }}" required>
                    </div>
                    <div class="form-group">
                        <label for="totalDineroGanado">Total Dinero Ganado</label>
                        <input type="number" step="0.01" class="form-control" id="totalDineroGanado"
                               name="totalDineroGanado" value="{{ $tenista->totalDineroGanado }}" required>
                    </div>
                    <div class="form-group">
                        <label for="numeroVictorias">Número de Victorias</label>
                        <input type="number" class="form-control" id="numeroVictorias" name="numeroVictorias"
                               value="{{ $tenista->numeroVictorias }}" required>
                    </div>
                    <div class="form-group">
                        <label for="numeroDerrotas">Número de Derrotas</label>
                        <input type="number" class="form-control" id="numeroDerrotas" name="numeroDerrotas"
                               value="{{ $tenista->numeroDerrotas }}" required>
                    </div>
                    <div class="form-group">
                        <label for="puntos">Puntos</label>
                        <input type="number" class="form-control" id="puntos" name="puntos"
                               value="{{ $tenista->puntos }}" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
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
