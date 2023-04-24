
# Php_Laravel-RRSS
Proyecto de una red social

IMPORTANT: no importados los ficheros node_modules, vendor.... instalar/crear proyecto de Laravel para generarse automaticamente


## Crear el proyecto Laravel desde el CMD:
- Entrar na carpeta del proyecto
	cd C:/wamp64/www/Curso-PHP

- Generar el poryecto (nombre proyecto 'proyecto-laravel')

	composer create-project laravel/laravel proyecto-laravel --prefer-dist
  
## Generar Host Virtual

- En el archivo 'httpd-vhosts.conf' en la carpeta C:\wamp64\bin\apache\apache2.4.51\conf\extra añadir:

	<VirtualHost *:80>   
    		DocumentRoot "${INSTALL_DIR}/www/Curso-PHP/proyecto-laravel/public"
    		ServerName proyecto-laravel.com.devel

    		<Directory "${INSTALL_DIR}/www/Curso-PHP/proyecto-laravel/public">
        		Options Indexes FollowSymLinks     
        		AllowOverride All
        		Order Deny,Allow
        		Allow from all     
   	 	</Directory> 
	</VirtualHost>

- En el archivo 'host' en la carpeta C:\Windows\System32\drivers\etc añadir:

	127.0.0.1 proyecto-laravel.com.devel

- Reiniciar el servidor Web 

## Crear diagrama en DIA y Base de Datos con SQL 
![DiagramaTienda](https://user-images.githubusercontent.com/124586059/234130681-d34846c2-ec64-400c-bd7e-7034d417eef9.jpeg)

## Vincular BD con el proyecto 
- En el archivo .env

	APP_URL=http://proyecto-laravel.com.devel/

	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3308
	DB_DATABASE=laravel_master
	DB_USERNAME=root
	DB_PASSWORD=null

- En el CMD vincular y crear Modelos, en el CMD dentro de la carpeta del proyecto:

	php artisan make:model Image

	php artisan make:model Comment

	php artisan make:model Like

