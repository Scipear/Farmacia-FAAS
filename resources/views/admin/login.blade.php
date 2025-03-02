@extends('master')

@section('titulo', 'Inicio de Sesión FAAS')

@section('contenido')

    <style>
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh; /* Ensure it takes at least 80% of viewport height */
        }

        .login-form {
            width: 400px; /* Adjust as needed */
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .login-form h2 {
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

        .login-button {
            background-color: #29a15f; /* Same as header color */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        .login-button:hover {
            background-color: #228b4d; /* Darker shade */
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

    <div class="login-container">
        <div class="login-form">
            <h2>{{ __('Iniciar Sesión') }}</h2>

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">{{ __('Correo Electrónico') }}</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Contraseña') }}</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit" class="login-button">{{ __('Iniciar Sesión') }}</button>
            </form>

            @if(session('error'))
                <div class="error-message">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>

@endsection