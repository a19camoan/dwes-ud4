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

## Actividad evaluable

El objetivo de esta actividad es añadir nuevas funcionalidades al proyecto de calendario.

En la situación actual del proyecto la aplicación permite seleccionar mes y año y muestra el calendario correspondiente. Utiliza colores diferentes para marcar:

* Día actual.
* Festivos nacionales.
* Festivos de comunidad.
* Festivos locales.

La nuevas funcionalidades que debes incorporar a la aplicación son las siguientes.

* Preferencias de usuario en la utilización de colores para mostrar los diferentes tipos de días.
* Uso de un fichero de texto para almacenar las credenciales de usuario. Para simplificar la aplicación trabajaremos con un único usuario registrado.
* Añadir un gestor de tareas para el usuario registrado. Como mínimo deberás implementar el alta de una nueva tarea.
* Mostrar en negrita los días que tienen tareas.
* Utilizar un fichero de texto para guardar y recuperar las tareas del usuario.

[Script](./actividad_evaluable/index.php)
