@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
<<<<<<< HEAD
                <div class="card-header">{{ __('Registro') }}</div>
=======
                <div class="card-header">{{ __('Register') }}</div>
>>>>>>> 08935a3c63a169b72add2804f61cee8d6ed33cf4

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
<<<<<<< HEAD
                            <label for="correo" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="correo" type="email" class="form-control @error('correo') is-invalid @enderror" name="correo" value="{{ old('correo') }}" required autocomplete="email">

                                @error('correo')
=======
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
>>>>>>> 08935a3c63a169b72add2804f61cee8d6ed33cf4
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
<<<<<<< HEAD
                            <label for="clave" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="clave" type="password" class="form-control @error('clave') is-invalid @enderror" name="clave" required autocomplete="new-password">

                                @error('clave')
=======
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
>>>>>>> 08935a3c63a169b72add2804f61cee8d6ed33cf4
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
<<<<<<< HEAD
                            <label for="clave-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="clave-confirm" type="password" class="form-control" name="clave_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        {{-- <div class="row mb-3">
                            <label for="rol" class="col-md-4 col-form-label text-md-end">{{ __('Rol') }}</label>

                            <div class="col-md-6">
                                <select id="rol" class="form-control @error('rol') is-invalid @enderror" name="rol" required>
                                    <option value="administrador" {{ old('rol') == 'administrador' ? 'selected' : '' }}>Administrador</option>
                                    <option value="cliente" {{ old('rol') == 'cliente' ? 'selected' : '' }}>Usuario</option>
                                </select>

                                @error('rol')
=======
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
>>>>>>> 08935a3c63a169b72add2804f61cee8d6ed33cf4
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
<<<<<<< HEAD
                        </div> --}}
=======
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
>>>>>>> 08935a3c63a169b72add2804f61cee8d6ed33cf4

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
<<<<<<< HEAD
                                    {{ __('Registrar') }}
=======
                                    {{ __('Register') }}
>>>>>>> 08935a3c63a169b72add2804f61cee8d6ed33cf4
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
