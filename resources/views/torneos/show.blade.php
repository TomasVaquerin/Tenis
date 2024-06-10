@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $torneo->nombre }}</h1>
        <p>Modalidad: {{ $torneo->modalidad }}</p>
        <p>Superficie: {{ $torneo->superficie }}</p>
        <p>Ganador: {{ $tenista->nombre }} {{$tenista->apellido}}</p>
        <p>Categoría: {{ $torneo->categoria }}</p>
        <p>Premios: {{ $torneo->premios }}</p>
        <p>Fecha de inicio: {{ $torneo->fechaInicio }}</p>
        <p>Fecha de fin: {{ $torneo->fechaFin }}</p>
        <img src="{{ $torneo->imagen }}" alt="Imagen del torneo" style="width: 100%; height: auto;">
    </div>
    <div class="card-body">
        <a href="{{ route('torneos.edit', $torneo) }}" class="btn btn-primary">Editar</a>
        <form action="{{ route('torneos.destroy', $torneo) }}" method="POST"
              style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Borrar</button>
        </form>
    </div>
@endsection
