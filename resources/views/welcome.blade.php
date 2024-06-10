@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-dark text-white py-5">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <h1 class="display-3 mb-4">¡Bienvenido a SporTenis!</h1>
                <p class="lead">Explora el mundo del tenis con nosotros. Descubre información sobre tenistas destacados,
                    torneos emocionantes y más.</p>
                <p>¿Listo para sumergirte en el apasionante mundo del tenis? ¡Únete a nosotros ahora mismo!</p>
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Regístrate</a>
            </div>
        </div>
    </div>
@endsection
