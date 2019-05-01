# Instrucciones de instalación
1. Tener instalado Laragon o las herramientas necesarias para ejecutar un proyecto en Laravel 5.8.
2. Crear una base de datos, de preferencia con el mismo nombre del proyecto.
3. Configurar, los siguientes parámetros, en el archivo .env:
    - Url en la que se ejecuta la aplicación *APP_URL*
    - Nombre de la base de datos *DB_DATABASE*
    - Usuario de acceso a la base de datos *DB_USERNAME*
    - Password de acceso a la base de datos *DB_PASSWORD*
4. Abrir la consola en el directorio del proyecto y ejecutar los siguientes comandos:
    - `composer install`
    - `php artisan key:generate`
    - `php artisan migrate:fresh --seed`
5. Ingresar con las credenciales 
    *username: admin*
    *password: admin*

# Cada vez que se sincroniza el proyecto con github
1. Configurar, los siguientes parámetros, en el archivo .env
    - Url en la que se ejecuta la aplicación *APP_URL*
    - Nombre de la base de datos *DB_DATABASE*
    - Usuario de acceso a la base de datos *DB_USERNAME*
    - Password de acceso a la base de datos *DB_PASSWORD*
2. Abrir la consola en el directorio del proyecto y ejecutar los siguientes comandos:
    - `composer install`
    - `php artisan migrate:fresh --seed`
3. Ingresar con las credenciales 
    *username: admin*
    *password: admin*

# En caso de tener la Alerta!: Falta el enlace simbólico de almacenamiento
1. Verificar que exista la carpeta public, caso contrario crearla.
2. Ejecutar el siguiente comando: `php artisan storage:link`

RUTAS LOGIN:
ejemplo login:
POST reparaccion.test/api/loginAPI
body: 	
    {   "email":"bm@hotmail.com",
        "password":"123"
    }

ejemplo logout
POST reparaccion.test/api/logoutAPI
ejemplo registro básico:
POST reparaccion.test/api/userap
body:{
	"name":"byronTest",
	"email":"bm@hotmail.com",
	"password":"123",
	"username":"bmr"
}

ejemplo editar básico:
PUT reparaccion.test/api/userap
body:{
	"name":"byronTest",
	"email":"bm@hotmail.com",
	"password":"123",
	"username":"bmr"
}




ejemplo: Obtener Usuario:
GET reparaccion.test/api/userap?api_token=vILqGLoiPS30jrUel781l2LTXHHP72ZbySTYWJpGjAmm9SAAr5hPDX5Kd9uj






