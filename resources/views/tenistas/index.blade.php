@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tenistas</h1>
        <a href="{{ route('tenistas.create') }}" class="btn btn-primary mb-3">Crear Tenista</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Ranking</th>
                    <th>País</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Edad</th>
                    <th>Altura</th>
                    <th>Peso</th>
                    <th>Mano</th>
                    <th>Revés</th>
                    <th>Entrenador</th>
                    <th>Total Dinero Ganado</th>
                    <th>Victorias</th>
                    <th>Derrotas</th>
                    <th>Imagen</th>
                    <th>Puntos</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tenistas as $tenista)
                    <tr>
                        <td>{{ $tenista->nombre }}</td>
                        <td>{{ $tenista->apellido }}</td>
                        <td>{{ $tenista->ranking }}</td>
                        <td>{{ $tenista->pais }}</td>
                        <td>{{ $tenista->FechaNacimiento }}</td>
                        <td>{{ $tenista->edad }}</td>
                        <td>{{ $tenista->Altura }}</td>
                        <td>{{ $tenista->peso }}</td>
                        <td>{{ $tenista->Mano }}</td>
                        <td>{{ $tenista->reves }}</td>
                        <td>{{ $tenista->entrenador }}</td>
                        <td>{{ $tenista->totalDineroGanado }}</td>
                        <td>{{ $tenista->numeroVictorias }}</td>
                        <td>{{ $tenista->numeroDerrotas }}</td>
                        <td><img src="{{ $tenista->imagen ?? \App\Models\Tenista::$IMAGE_DEFAULT }}"
                                 alt="{{ $tenista->nombre }}" width="50"></td>
                        <td>{{ $tenista->puntos }}</td>
                        <td>
                            <a href="{{ route('tenistas.show', $tenista) }}" class="btn btn-primary btn-sm">Ver</a>
                            <a href="{{ route('tenistas.edit', $tenista) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('tenistas.destroy', $tenista) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination-container">
            {{ $tenistas->links('pagination::bootstrap-4') }}
        </div>
    </div>

@endsection
