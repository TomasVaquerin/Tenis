@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Profile') }}</div>

                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <!-- Agrega más información de perfil aquí si lo necesitas -->

                        <!-- Botones de acciones -->
                        <div class="mt-3">
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                                {{ __('Edit Profile') }}
                            </a>

                            <form action="{{ route('profile.destroy') }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete your profile?')">
                                    {{ __('Delete Profile') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
