<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'FAAS')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background: #29a15f;
            color: white;
            padding: 20px;
            font-size: 24px;
             display: flex;             /* Added */
             justify-content: space-between; /* Added */
             align-items: center;        /* Added */
        }
        .container {
            margin-top: 50px;
        }
        input[type="text"] {
            width: 50%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            background: #29a15f;
            ;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #29a15f;
        }

    </style>

   <style>
    .nav-tabs {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex; /* Use flexbox for horizontal layout */
         /* justify-content: flex-end;  Remove This, it conflicts with header's flex */
    }

    .nav-item {
        margin-right: 10px; /* Space between tabs */
    }

    .nav-link {
        display: block;
        padding: 8px 16px;
        text-decoration: none;
        color: white; /* Modified */
        border: 1px solid #ccc;
        border-radius: 4px 4px 0 0; /* Rounded top corners */
        background-color: #29a15f; /* Modified */
    }

    .nav-link:hover {
        background-color: #29a15f; /* Modified */
    }

    .nav-link.active {
        background-color: white; /* Modified */
        border-bottom: 1px solid white; /* Hide bottom border */
        color: #29a15f; /* Modified */
    }

    .content {
        margin-top: 20px; /* Space between tabs and content */
    }
</style>

<body>

<header>
    @yield('header', 'Farmacias FAAS')

    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
        <li class="nav-item">
            <a class="nav-link active" href="/">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.login.form') }}">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.register.form') }}">Registro</a>
        </li>
        
    </ul>
</header>

<div class="container">
    @yield('contenido')
</div>

</body>
</html>