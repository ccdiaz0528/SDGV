Primeramente hay que tener instalado el software necesario:
1. XAMPP es un software libre y multiplataforma que permite crear y probar páginas web en un ordenador local: https://www.apachefriends.org/es/download.html
2. Composer es un sistema de gestión de paquetes para programar en PHP el cual provee los formatos estándar necesarios para manejar dependencias y librerías de PHP: https://getcomposer.org/download/
3. Declarar variables de entorno agregar la ruta donde esta instalado el PHP: C:\xampp\php esta es la ruta por defecto al instalarlo en un sistema operativo windows.
4. Git es un software de control de versiones diseñado por Linus Torvalds, pensando en la eficiencia, la confiabilidad y compatibilidad del mantenimiento de versiones de aplicaciones cuando estas tienen un gran número de archivos de código fuente : https://git-scm.com/downloads/win 
5. Instalar un editor de codigo, uno de los mas famosos es Visual Studio Code: https://code.visualstudio.com/
6. Una vez instalado los programas abrir el XAMPP y ejecutar las casillas MYSLQ y APACHE
7. Abrir Visual Studio Code y instalar las extensiones necesarias para usar PHP, HTML, CSS, LARAVEL y poder inicializar el entorno local
8. Una vez ya instaladas procedemos a ir al apartado de view en Visual Studio Code y abrir un Command Palette y ejecutar GIT CLONE pegando el link del repositorio
9. Se abre una ventana para seleccionar la ruta en la cual se clonara el repositorio, tiene que estar en la siguiente ruta: C:\xampp\htdocs al ya tener el proyecto pasamos al siguiente paso
10. en el archivo .env esta configurado el nombre de la base de datos como "sdgv" si deseas puedes continuar usando este nombre o el nombre que desees
11. acontinuacion abrimos una terminal y usamos cd para acceder como tal al directorio donde estan todos los archivos del proyecto
12. En nuestro navegador nos dirigimos a http://localhost/phpmyadmin/ y creamos una base de datos con el nombre por defecto "sdgv" o el nombre que cambiaste en caso tal en el archivo .env
13. Ya estando en la terminal de Visual Studio Code utilizamos el comando php artisan migrate, al hacer esto se crean las tablas por defecto que trae laravel y las tablas donde tenemos nuestros campos esto lo podemos ver en phpmyadmin
14. Una vez migrada la base de datos podemos inicializar el entorno local para poder visualizarlo con "php artisan serve", esto nos genera un link en el cual debemos acceder para ver el aplicativo
15. Y listo se abre el aplicativo donde en una barra de navegacion esta: el inicio del aplicativo, y apartado de registro donde vamos a poder registrar la informacion
16. Una vez teniendo registros podemos eliminarlos con el boton "Eliminar" y para querer editar un registro nos paramos en cualquier campo del registro en el apartado titulado "Editar"
17. Todo esto lo puedes verificar de manera manual en "phpmyadmin" o en el Apartado de registro como comentaba anteriormente.
18. Finalmente estos serian todos los pasos a seguir para un correcto funcionamiento del aplicativo :D ! 




Comandos Necesarios:
php artisan serve //Iniciar entorno local
php artisan migrate //Migrar las tablas a la base de datos
php artisan db:seed --class=NombreDelSeeder //migrar registro por default

