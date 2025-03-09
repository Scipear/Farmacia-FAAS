@extends('master')

@section('titulo', 'Panel de Gerente')

<header>
@yield('header', 'Farmacias FAAS')
<ul class="nav-tabs"> <!-- Pestañas dentro del header -->
        <li class="nav-item">
            <a class="nav-link active" href="/">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
        </li>  
</ul>
</header>

@section('contenido')

    <h1>Bienvenido Gerente</h1>
    <p>Selecciona una opcion para gestionar</p><br>
    
    <a href="{{ route('gerente.gestionar_emp') }}"><button>Gestionar empleados</button></a><br><br>

    <a href="{{ route('gerente.gestionar_emp') }}"><button>Gestionar stock (Medicinas)</button></a><br><br>

    <a href="{{ route('gerente.gestionar_ped') }}"><button>Gestionar pedidos</button></a><br><br> 

    <a href="{{ route('gerente.gestionar_compras') }}"><button>Gestionar compras</button></a><br><br> 

    <a href="{{ route('gerente.gestionar_cuentas') }}"><button>Ver cuentas por pagar</button></a><br><br> 

    <a href="{{ route('gerente.gestionar_emp') }}"><button>Cerrar sesión</button></a><br><br>

@endsection