<!---
¡Por favor, lee esto!

Antes de crear un nuevo issue para una petición de desarrollo asegurate de que tengas la siguiente documentación: 

Diagrama de flujo del sistema de funciones cruzadas: Para conocer el orden en el que se crearán los módulos, el nombre de cada módulo, su funcionalidad y los tipos de usuarios que podrán acceder al módulo

Diagrama relacional: Para obtener los campos, sus tipos y sus relaciones

Descripción general: Para obtener las características particulares que tendrá ese módulo que no son especificadas en el diagrama de flujo del sistema, como por ejemplo si se crea algún tipo de documento, los datos que debe llevar o las características de ese documento, si tendrá alguna función en particular ese módulo, etc.
--->

## El nombre del módulo

(Menciona el nombre del módulo que se desarrollará en este issue)

## Descripción del módulo

(Menciona la funcionalidad del módulo)

## Campos, tipos y relaciones

(Agrega aquí la imagen de tu diagrama relacional)

## Características adicionales y particulares

(Basate de la descripción general de la documentación para obtener las características adicionales y particulares)

## Desarrollador asignado

(Menciona al desarrollador asignado para este issue)

## Fecha de primera revisión, segunda revisión y liberación

(Agrega las fechas para la primera revisión, segunda revisión y liberación del módulo)

## Dependencias del módulo

<!--- Si el módulo no depende de otro, se asigna al tablero para desarrollarse de inmediato, de lo contrario, si depende de otro módulo se pone en el tablero en espera para ser desarrollado hasta terminar las dependencias del módulo --->

¿Este módulo depende de otro?

- [ ] Si
- [ ] No

(En caso de si, especificar las dependencias del módulo)

## Testeos del módulo

Antes de empezar a desarrollar el módulo, es indispensable que se descarguen los últimos cambios, para obtener los tests que se han subido en los commit anteriores.

Es importante ejecutar los tests antes de empezar a trabajar el módulo y, asegurarse que todos los tests pasan, si alguno truena favor de verificar con la Coordinación de Desarrollo de Sistemas la procedencia de dicha incidencia para su pronto ajuste.

Al térimo del desarrollo del módulo, es necesario que se implementen los tests para validar dicho módulo en todos sus aspectos, a tomar como ejemplo un CRUD, el test debe realizar cada una de las funcionalidades del CRUD.

Antes de subir cambios favor de ejecutar nuevamente los test y asegurarse que todos pasan correctamente, tanto los anteriores como los nuevos, si alguno truena es posible que el problema se deba a un mal desarrollo en el módulo, el cual debe ser arreglado hasta que todos los test pasen correctamente.

## Consideraciones sobre las migraciones

Para el caso de implementar migraciones que impliquen modificaciones o eliminación de campos de la Base de Datos es de suma importancia tomar en cuenta los siguientes puntos:

1.  En toda migración, primeramente se ejecuta el comando "php artisan migrate", al término, inmediatamente se debe ejecutar el comando "php artisan migrate:rollback", para asegurar que la migración se puede revertir sin problema, para caso futuro que ésta requiera ser eliminada. Si al ejecutar éste último comando, se produce un error, la migración posiblemente se encuentre mal implementada, deberá corregir ese problema hasta que la migración se pueda revertir con éxito. De ahí volver a ejecutar nuevamente el comando "php artisan migrate".

2.  En las migraciones que efectúen un cambio o eliminación de algún campo de la tabla de la Base de Datos, se deberá realizar el mismo procedimiento marcado en el punto 1, con la diferencia que al revertir, deberá dejar la tabla como se encontraba en el último commit (ejemplo: si se requiere modificar la tabla users, asignando un nuevo campo "edad", eliminar un campo "name" y editar un campo "username" por "nombre_usuario", al ejecutar la migración se deben reflejar esos cambios en los campos, pero al ejecutar rollback, el campo "edad" se elimina, el campo "name" se restaura, el campo "nombre_usuario" se cambia por "username", dejando así la tabla como se encontraba en el último commit).

Si se presentan dudas sobre estos puntos es de suma importancia acudir con el Coordinador de Desarrollo de Sistemas para la aclaración de las mismas.

/label ~Solicitud de Desarrollo