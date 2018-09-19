[![Build Status](https://travis-ci.com/Unicen-Tupar/travis-example.svg?branch=master)](https://travis-ci.com/Unicen-Tupar/travis-example)
# Travis example
Repositorio base con un proyecto escrito usando Laravel para practicar como configurar [Travis-CI](https://travis-ci.org/).

## Qué es el proyecto?
Es la aplicación base de ejemplo de Laravel.
Tiene agregado un método en el modelo de User, que devuelve el nombre completo del usuario.

```php
//File: app/User.php
public function fullName()
{
  return "$this->lastname, $this->name";
}
```
Creamos ademas un test que cubre ese método.

```php
//File: tests/Unit/userTest.php
public function testfullName()
{
    $user = factory(User::class)->create(['name'=>'Esteban', 'lastname' => 'Quito']);
    $fullName = $user->fullName();
    $this->assertEquals($fullName, 'Quito, Esteban');
}
```

## Cómo ejecuto el proyecto?
* Instalar las dependencias
```
docker run --rm -v $(pwd):/app composer/composer install
```
* Crear el archivo `.env` copiando el contenido de `.env.example`
```
cp .env.example .env
```
* Crear la base de datos
```
docker-compose exec app php artisan migrate
```
* Ejecutar
```
docker-compose up
```
* Entrar a `http://localhost:8000`

## Cómo ejecuto los tests?
```
docker-compose exec app ./vendor/bin/phpunit
```

## TO DO
* Hacer un fork del proyecto en tu usuario de Github.
* Crear un archivo `.travis.yml`
* Configurar para que la aplicación ejecute los tests en:
  * php 7.1.3
  * php 7.2
  * nightly
