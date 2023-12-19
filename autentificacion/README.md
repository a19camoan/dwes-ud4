# Ejercicios de autentificación

## Ejercicio 1

Crea un sistema básico de autenticación en PHP. El objetivo es permitir que los usuarios se autentiquen con un nombre de usuario y una contraseña para acceder al área protegida.

Utiliza un array de configuración para almacenar los usuarios registrados en el sistema.

Si no estamos autenticados en el sistema, la página de inicio mostrará: formulario de login, información pública de inicio y menú de navegación por la zona pública.

Si estamos autenticados en el sistema, la página de inicio mostrará: información de usuario con opción de cierre de sesión, hora de inicio de sesión, información pública de inicio y menú de navegación por la zona pública y privada.

Las páginas de la aplicación solo deben mostrar un mensaje indicando si son públicas o privadas.

[Script](./ej1/index.php)

## Ejercicio 2

Modifica el ejercicio anterior incluyendo varios perfiles de usuario.

[Script](./ej2/index.php)

## Ejercicio 3

Implementa un sistema de autentificación utilizando las características del protocolo http.

[Script](./ej3/index.php)
