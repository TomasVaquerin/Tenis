@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Perfil de {{ $tenista->nombre }} {{ $tenista->apellido }}</h1>
        <div class="row">
            <div class="col-md-4">
                <img src="{{ $tenista->imagen ?? \App\Models\Tenista::$IMAGE_DEFAULT }}" alt="{{ $tenista->nombre }}"
                     class="img-fluid">
            </div>
            <div class="col-md-8">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Nombre:</strong> {{ $tenista->nombre }}</li>
                    <li class="list-group-item"><strong>Apellido:</strong> {{ $tenista->apellido }}</li>
                    <li class="list-group-item"><strong>Ranking:</strong> {{ $tenista->ranking }}</li>
                    <li class="list-group-item"><strong>País:</strong> {{ $tenista->pais }}</li>
                    <li class="list-group-item"><strong>Fecha de Nacimiento:</strong> {{ $tenista->FechaNacimiento }}
                    </li>
                    <li class="list-group-item"><strong>Edad:</strong> {{ $tenista->edad }}</li>
                    <li class="list-group-item"><strong>Altura:</strong> {{ $tenista->Altura }}</li>
                    <li class="list-group-item"><strong>Peso:</strong> {{ $tenista->peso }}</li>
                    <li class="list-group-item"><strong>Mano:</strong> {{ $tenista->Mano }}</li>
                    <li class="list-group-item"><strong>Revés:</strong> {{ $tenista->reves }}</li>
                    <li class="list-group-item"><strong>Entrenador:</strong> {{ $tenista->entrenador }}</li>
                    <li class="list-group-item"><strong>Total Dinero Ganado:</strong> {{ $tenista->totalDineroGanado }}
                    </li>
                    <li class="list-group-item"><strong>Victorias:</strong> {{ $tenista->numeroVictorias }}</li>
                    <li class="list-group-item"><strong>Derrotas:</strong> {{ $tenista->numeroDerrotas }}</li>
                    <li class="list-group-item"><strong>Puntos:</strong> {{ $tenista->puntos }}</li>
                </ul>
                <h2>Torneos</h2>

                <a href="{{ route('tenistas.edit', $tenista) }}" class="btn btn-warning mt-3">Editar</a>
                <form action="{{ route('tenistas.destroy', $tenista) }}" method="POST" class="d-inline mt-3">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
