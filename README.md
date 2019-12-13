# Challenge 201912
Backend desarrollado en Laravel para el challenge de proceso de selección de personal Diciembre 2019

## Dependencias de [Laravel](https://laravel.com/docs/5.8/installation)

- PHP >= 7.1.3
- BCMath extension PHP 
- Ctype extension PHP
- JSON extension PHP
- Mbstring extension PHP
- OpenSSL extension PHP
- PDO extension PHP
- Tokenizer extension PHP
- XML extension PHP

## Dependencia del proyecto

- [Composer](https://getcomposer.org/)
- MySQL

## Intalacion y configuracion del entorno

- Clonar el proyecto
- Acceder a la carpeta root del proyecto y correr el comando composer install
- Crear una instancia de base de datos en MySQL
- Configurar el archivo .env a partir del .env.example modificando los parametros de conexion a la base
- Correr el comando `php artisan migrate:install` para que se instale el repositorio de migrations en la instancia de la base
- Correr el comando `php artisan migrate:refresh --seed` para que se ejecuten los migrations y los seeds

