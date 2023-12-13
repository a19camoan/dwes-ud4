# Ejercicios de ficheros

## Ejercicio 1

Desarrolla una aplicación que genere un script para la creación de usuarios a partir de un fichero.

```text
Opción A: MYSQL
    Usuario: AAaan_1daw
    BD: bdAAaann_1daw
    AA: Dos primeras letras del primer apellido.
    aa: Dos primeras letras del segundo apellido.
    n: Inicial del nombre.
    Ayuda:
    BD: CREATE DATABASE bdejemplo
    Usuarios: GRANT ALL PRIVILEGES ON bdejemplo.* TO ‘usuario’@’localhost’
    IDENTIFIED BY ‘clave’;
Opción B: ORACLE
Opción C: LINUX
```

Crear un formulario para parametrizar la generación del fichero.

[Script](./ej1/index.php)

## Ejercicio 2

Diseña e implementa una galería de fotos con las imágenes guardadas en un directorio. La aplicación dispondrá de un instalador (install.php) que realizará las siguientes tareas:

* Comprobar que el sistema tiene más de 10 Gigas de almacenamiento. Generará un error en caso contrario y abortará la instalación.
* Solicitar las credenciales del administrador para almacenarlas en un fichero.
* Crear un directorio para almacenar las imágenes.
* Redireccionar al inicio de la aplicación cuando el proceso de instalación se haya realizado correctamente.
* La aplicación borrará el instalador la primera vez que se ejecute.

La galería de fotos es pública y accesible por cualquier usuario del sistema.

El administrador podrá realizar las siguientes operaciones:

* Subida de imágenes.
* Borrado de imágenes.
* Copiado de imágenes.
* Renombrado de imágenes.

[Script](./ej2/index.php)
