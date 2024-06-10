@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Torneos</h1>
        <a href="{{ route('torneos.create') }}" class="btn btn-primary mb-3">Crear torneo</a>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($torneos as $torneo)
                <div class="col">
                    <div class="card">
                        <img src="{{ $torneo->imagen ?? \App\Models\Tenista::$IMAGE_DEFAULT }}" class="card-img-top"
                             alt="{{ $torneo->nombre }}">
                        <div class="card-body">
                            <p class="card-text">Nombre: {{ $torneo->nombre }}</p>
                            <a href="{{ route('torneos.show', $torneo) }}" class="btn btn-primary">Ver detalles</a>
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
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
