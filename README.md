# PASOS A SEGUIR PARA DESGARCAR Y CONFIGURAR EL PROYECTO

## REQUISITOS NECESARIOS.

## Xampp

Descargar xampp [aquí](https://www.apachefriends.org/es/index.html) y realizar su debida instalación.

-   NECESARIO: Al momento de probar el proyecto o ejecutar algún comando en este es necesario tener activo "Apache" y "MySQL" dentro de xampp.

## Composer

Descargar composer [aquí](https://getcomposer.org) y realizar su debida instalación.

Si ya tienes instalado node.js y/o git en tu computador, salta los pasos 3 y 4 respectivamente.

## NodeJs

Descargar node.js [aquí](https://nodejs.org/en/download) y realizar su debida instalación.

## Git

Descargar git [aquí](https://git-scm.com) y realizar su debida instalación.

##

Ya se tiene todo lo necesario para instalar Laravel, para esto abre la consola de comandos de tu computador y ejecuta el siguiente comando:

```bash
composer global require laravel/installer
```

Esto instalará el instalador de laravel en tu equipo.

-   OJO: Al clonar el repositorio del proyecto, es recomendado que la carpeta se guarde dentro del directorio 'C:\xampp\htdocs'. Puedes crear una carpeta dentro del directorio para guardar el proyecto si quieres tenerlo más organizado.

Si estás usando Visual Studio Code puedes realizar el siguiente paso abriendo el proyecto y usando la terminal que trae Visual Studio, si no, deberás abrir la consola de comandos de tu computador y ubicarla dentro del proyecto.

## PASO 1

Ejecuta los siguientes comandos uno a uno.

```bash
npm install
npm run build
php artisan migrate
```

Para abrir el servidor (probar el proyecto) utiliza el comando

```bash
php artisan serve
```

Y pega el url dado en tu navegador.
