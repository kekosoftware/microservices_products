# Ambiente [Docker](https://www.docker.com) para Desarrollo
Incluye

* [PHP](https://www.php.net/)
* [MySQL](https://www.mysql.com/)
* [phpMyAdmin](https://www.phpmyadmin.net/) 

## Versiones incluidas
* `PHP_VERSION`     -> 8.1.4-fpm-alpine3.14
* `MARIADB_VERSION` -> 10.4.21-focal

## Requerimientos

* [Docker Desktop](https://www.docker.com/products/docker-desktop)

## Configurar el ambiente de desarrollo

Puedes utilizar la configuración por defecto, pero en ocasiones es recomendable modificar la configuración para que sea igual al servidor de producción. La configuración se ubica en el archivo `.env` con las siguientes opciones:

* `PHP_VERSION` versión de PHP ([Versiones disponibles de PHP](https://github.com/docker-library/docs/blob/master/php/README.md#supported-tags-and-respective-dockerfile-links)).
* `PHP_PORT` puerto para servidor web.
* `MARIADB_VERSION` versión de MARIADB([Versiones disponibles de MySQL](https://hub.docker.com/_/mariadb)).
* `MARIADB_USER` nombre de usuario para conectarse a MARIADB.
* `MARIADB_PASSWORD` clave de acceso para conectarse a MARIADB.
* `MARIADB_DATABASE` nombre de la base de datos que se crea por defecto.

## Instalar el ambiente de desarrollo

La instalación se hace desde la línea de comandos:
```zsh
docker-compose up -d
```
Puedes validar que se ha instalado correctamente accediendo a: [http://localhost/info.php](http://localhost/info.php)

## Comandos disponibles

Una vez instalado, se pueden utilizar los siguiente comandos:

```zsh
docker-compose start    # Iniciar el ambiente de desarrollo
docker-compose stop     # Detener el ambiente de desarrollo
docker-compose down     # Detener y eliminar el ambiente de desarrollo.
```

## Estructura de Archivos

* `/docker/` contiene los archivos de configuración de Docker.
* `/www/` carpeta para los archivos PHP del proyecto.

## Accesos

### Web

* http://localhost/

### Base de datos

Existen dos dominios para conectarse a base de datos.

* `MariaDB`: para conexión desde los archivos PHP.
* `localhost`: para conexiones externas al contenedor.

Las credenciales por defecto para la conexión son:
```zsh
Usuario:        userDB
Contraseña:     pwdDB
Base de datos:  nameDB
```
