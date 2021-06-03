# REST API Movies

Ejercico para la materia Programación Web. Consiste en crear una API REST que consuma los recursos de una base de datos de peliculas.

## Funcionalidades

- Ver el listado de todas las peliculas.
- Ver los datos de una pelicula a travez de su `id`.
- Crear una nueva pelicula.

## Pre-requsitos

- Servidor Apache donde levantar la API.
- Base de datos SQL con la siguiente tabla:

```
movies (
  id: INT AUTO_INCREMENT,
  name: VARCHAR,
  image: VARCHAR,
);
```

- Configurar las variables de entorno en el archivo `config.inc.php`

## Instalación

Instalar las dependencias del proyecto utilizando [composer](https://getcomposer.org/).

```
composer install
```

Desplegar la carpeta del proyecto en el servidor APACHE.

## Uso

- Ver todas las peliculas

```
@GET ('/')
```

- Ver una pelicula a travez de su `id`

```
@GET('/?id=:movie_id')
```

- Crear una pelicula

```
@POST('/')

{
  "name": ":movie_name",
  "image": ":movie_image"
}
```

## Pruebas

Dentro del proyecto se encuentra la collección de requests de [Postman](https://www.postman.com/). Pueden importarla utilizando la [aplicación](https://learning.postman.com/docs/getting-started/importing-and-exporting-data/).

## Autores

- Avril Bentancor.
- Nicolás Machado da Silva.
