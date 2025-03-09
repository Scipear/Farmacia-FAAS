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

        h2{
            font-family: Arial, sans-serif;
            text-align: left;
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

        select{
            width: 15%;
            padding: 10px;
            font-size: 16px;
            border: 2px solid #ccc;
            border-radius: 10px;
            background:rgb(228, 255, 222);
        }

        #popup{
            font-size: 16px;
            font-family: Arial, sans-serif;
            text-align: center;
            border-collapse: collapse;
            /* padding: 10px;
            margin: 60px;  */
            border: none;
            border-radius: 5px;
            background:rgb(52, 119, 37);
            color:rgb(255, 255, 255); /* Modified */
        }

        table, th, td{
            text-align: center;
            /* width: 90%; */
            border-collapse: collapse;
            padding: 10px;
            margin: 60px; 
            border: none;
            border-radius: 5px;
        }

        th
        {
            width: %;
            font-size: px;
            background:rgb(57, 139, 39);
            color: white;
        }

        td{
            font-size: 12px;
            background:rgb(219, 219, 219);
            color: black;
        }

    </style>

   <style>
        .buttonCont{
            display: flex;
            justify-content: left;
        }

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

    /* .imag{
        width: 200px;
        display: block;
    } */

    .botonIr{
            padding: 10px 20px;
            font-size: 16px;
            background: #29a15f;
            ;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
    }

    .botonAg{
            padding: 10px 20px;
            font-size: 16px;
            background: #29a15f;
            ;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-right: 1425px;
    }

    .botonVer{
            padding: 10px 20px;
            font-size: 16px;
            background: #29a15f;
            ;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-right: 10px;
    }

    .botonPDF{
            padding: 10px 20px;
            font-size: 16px;
            background: #29a15f;
            ;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-right: 1425px;
    }
    

    .botonEd{
            padding: 10px 20px;
            font-size: 16px;
            background: #29a15f;
            ;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-right: 10px;
    }

    .espacio{
        margin-top: 40px;
    }

    /* .formElim{
        
    }
 */

    .cards{
        display: flex;
    }

    .card{
        margin: 10px;
        background-color:rgb(209, 235, 220); /* Modified */
        border: 2px solid white;
        border-radius: 5px;
    }




</style>

<body>

<div class="container">
    @yield('contenido')
</div>

</body>
</html>