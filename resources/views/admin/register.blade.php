@extends('master')

@section('titulo', 'Registro de Administrador')

@section('contenido')

    <style>
        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
        }

        .register-form {
            width: 400px;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .register-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #66afe9;
            box-shadow: 0 0 5px rgba(102, 175, 233, 0.5);
        }

        .register-button {
            background-color: #29a15f;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        .register-button:hover {
            background-color: #228b4d;
        }

        .error-message {
            background-color: #f2dede;
            color: #a94442;
            border: 1px solid #ebccd1;
            padding: 10px;
            border-radius: 4px;
            margin-top: 20px;
        }
    </style>

    <div class="register-container">
        <div class="register-form">
            <h2>{{ __('Registro') }}</h2>

            <form method="POST" action="{{ route('admin.register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">{{ __('Nombre') }}</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label for="email">{{ __('Correo Electrónico') }}</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Contraseña') }}</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">{{ __('Confirmar Contraseña') }}</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>

                <button type="submit" class="register-button">{{ __('Registrar') }}</button>
            </form>

            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

@endsection