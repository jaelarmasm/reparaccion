# Instrucciones de instalación
1. Tener instalado Laragon o las herramientas necesarias para ejecutar un proyecto en Laravel 5.8
2. Crear una base de datos, de preferencia con el mismo nombre del proyecto
3. Configurar, la conexión a la base de datos, en el archivo .env (*DB_DATABASE, DB_USERNAME, DB_PASSWORD*)
4. Configurar, la url en la que se ejecuta la aplicación, en el archivo .env (*APP_URL*)
5. Abrir la consola en el directorio del proyecto y escribir los siguientes comandos:
    - composer install
    - php artisan key:generate
    - php artisan migrate:fresh
    - php artisan db:seed
6. Ingresar con las credenciales 
    *username: admin*
    *password: admin*