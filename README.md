# Sistema de Votacion.

- Este es un sistema de votación en línea que permite a los usuarios emitir su voto para una elección en particular.

# Herramientas
- PHP versión PHP 8.1.10
- HeidiSQL - MySQL 12.1
- Laragon versión 6.0.2


# Uso
  Una vez instalado, el sistema de votación se puede utilizar de la siguiente manera:

- Levantar laragon 
- Para crear una nueva elección, haga rellene el formulario en "Formulario de votacion" y complete los detalles de la elección.
- Para votar en una elección, haga clic en "Votar" y seleccione su opción de voto.


# Instalar
# Requisitos 

# Para utilizar este sistema, es necesario tener lo siguiente:

- Servidor web (por ejemplo, Apache)
- Lenguaje de programación para el servidor (por ejemplo, PHP)
- Sistema de gestión de bases de datos (por ejemplo, MySQL)


# Pasos

- Descargue los archivos del sistema de votación en su servidor web.
  
  # Clonar el repositorio en tu directorio local.
  
  # Copy code
 - git clone https://github.com/Camilo-andres19998/Sistema_votacion.git

- Cree una base de datos en su sistema de gestión de bases de datos y asegúrese de tener los permisos necesarios para acceder a ella.

- En la carpeta 'config

- Abra su navegador web y acceda a la URL del sistema de votación. Se iniciará automáticamente la instalación del sistema.


- Siga las instrucciones en pantalla para completar la instalación.


#   Instalar Laragon siguiendo las instrucciones del sitio oficial: https://laragon.org/download/index.html




#  Configurar la base de datos en Laragon:
Abrir Laragon

Seleccionar el menú "MySQL" > "Crear base de datos"

#  Establecer el nombre de la base de datos, el usuario y la contraseña

Importar la estructura de la base de datos en la base de datos creada anteriormente:

Abrir el archivo en tu editor de texto bdvotaciones.sql

# Copiar todo el contenido del archivo

-  Abrir la aplicación "HeidiSQL" incluida en Laragon

#  Conectar a la base de datos creada anteriormente

- Pegar todo el contenido del archivo en la ventana de consulta de HeidiSQL y bdvotaciones.sql

- Configurar las credenciales de la base de datos en el archivo :config.php

#  Abrir el archivo en tu editor de texto favorito config.php

- Establecer el nombre de la base de datos, el usuario y la contraseña

- Configurar la conexión a la base de datos en el archivo : conexion.php

- Abrir el archivo en tu editor de texto favorito conexion.php

#  Establecer el nombre de la base de datos, el usuario y la contraseña en la conexión a MySQL
Ejecutar la aplicación:

# Abrir Laragon

- Seleccionar el menú "Apache" > "Start All"

-  Abrir un navegador web y acceder a la dirección http://localhost/Sistema_votacion/votacion.php

- ¡Listo! Ahora deberías poder ejecutar el proyecto en tu entorno local. Si tienes algún problema, revisa los pasos de instalación y verifica que todo esté configurado correctamente.
