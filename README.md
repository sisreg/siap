Sistema Integral de Atención al Paciente - SIAPS
====================================================
Sistema enfocado a la Atención del Paciente; que contiene todo el historial 
clínico de un paciente dentro del primer nivel de atención. Esto con el fin de
poder darle seguimiento en todas las áreas del establecimiento y así cualquier
personal autorizado pueda análizar la información clínica de un determinado 
paciente.

La intalación se dividen en las siguientes etapas:

1. Instalación y configuración del entorno Web.
2. Instalación y configuración de la base de datos.
3. Instalación y configuración de JasperReports Server.
4. Instalación y configuración del SIAPS.

A continuación se describen las etapas de configuración para que el SIAPS pueda
funcionar en un establecimiento.

1. Instalación y configuración del entorno Web
----------------------------------------------
* Para preparar el entorno Web en Debian 7.0 "Wheezy"  es necesario instalar 
los siguientes paquetes lo cual implica tener configurado apropiadamente el 
archivo sources.list.

* Primero se deberá actualizar los repositorios del sistema operativo. 
Como **usuario root** escribir en una terminal:

        aptitude update && aptitude full-upgrade

* Siempre como **usuario root** ejecutar la siguiente instrucción:

        aptitude install apache2-mpm-prefork php5 php5-gd php-apc libgd2-xpm acl \
        php5-mcrypt curl git libapache2-mod-php5 php5-intl php-pear php5-cli \
        php5-pgsql postgresql openjdk-7-jdk openjdk-7-jre

* Editar el archivo /etc/php5/apache2/php.ini como usuario root, con cualquier
editor de texto, puede ser nano o vi; ir a la sección *Module Settings* y 
modificar o agregar la línea *;date.timezone =* con lo siguiente:

        date.timezone = America/El_Salvador

2. Instalación y configuración de la base de datos
-----------------------------------------
###Configuración de PostgreSQL
* Se procede a realizar cambios al archivo de configuración de postgresql 
para que pueda conectarse desde un usuario creado especialmente para la 
configuración. Editar el archivo */etc/postgresql/9.1/main/pg_hba.conf* como
**usuario root**, con cualquier editor de texto, puede ser nano o vi:

* Ir al final del archivo e identificar las siguientes líneas:

        # "local" is for Unix domain socket connections only
        local   all         all                               peer
* Cambiar el valor *peer* por *ident*, la línea debería quedar como se muestra
a continuación:

        # "local" is for Unix domain socket connections only
        local   all         all                               md5
* Reiniciar el servicio de postgres con la siguiente instrucción:

        etc/init.d/postgresql restart

###Creación del usuario
* Como **usuario postgres** ejecutar la siguiente sentencia desde consola:

        createuser -DRSP nombreUsuario

###Creación de la base de datos
* Siempre como **usuario postgres** ejecutar la siguiente sentencia desde
consola:

        createdb nombreBaseDatos -O nombreUsuario

###Carga del script
* Clonar el siguiente repositorio de git: git@git.salud.gob.sv:SIAPS/db_siaps.git
* Entrar al directorio y realizar la carga con el archivo denominado 
**siaps-prod.sql** ejecutando la siguiente sentencia como 
**usuario postgres**:

        pg_dump -U nombreUsuario nombreBase -f nombreArchivo.sql
 
3. Instalación y configuración de JasperReports Server
-------------------------------------------------------
###Instalación
* Para poder instalar JasperReports en el proceso de instalación es necesario
la creación de ciertas bases de datos; para ello el instalador solicita la 
contraseña de usuario postgres por defecto Postgresql no le asigna ninguna 
contraseña se debe asignar una momentáneamente solo para este proceso. Como 
**usuario postgres** ejecutar:

        psql
* Aparecerá en el prompt de la consola lo siguiente:

        psql (9.1.9)
        Digite <<help>> para obtener ayuda.
        
        postgres=#
* Para cambiar la contraseña del usuario ejecutar lo siguiente:

        ALTER USER postgres WITH PASSWORD 'postgres';
* Al presionar enter aparecerá abajo de la línea digitada anteriormente lo 
siguiente:

        ALTER ROLE
* Se debe copiar el instalador de 64 bits del JasperReports Server 
proporcionado en el **home** del **root**; y como **usuario root** se procede a 
dar permisos de ejecución al archivo proporcionado con la siguiente sentencia:

        chmod +x jasperreports-server-cp-5.x.x-linux-x64-installer.run

* Siempre como usuario root se procederá a la instalación con la siguiente 
sentencia:

        ./jasperreports-server-cp-5.x.x-linux-x64-installer.run

* Lo primero que se pide es leer la licencia de acuerdo del JasperReports
Server.Presionar enter hasta terminar toda la licencia; luego se procede a 
aceptar los términos de la licencia tecleando **y** y presionar enter.
* Preguntará la opción de instalación que se desea,  presionar el número **2** 
para seleccionar la opción **Custom Install (Instalación Personalizada)**. 
* Se procede a seleccionar la ruta de instalación del JasperReports; por 
defecto el instalador propone **/opt**, para seleccionar esta opción solo
presionar enter.
* El siguiente paso es relacionado al servidor **Apache Tomcat**, el instalador 
propone instalar este servicio junto con su servidor. Presionar el número **1** 
para seleccionar la opción **I want to use the bundled Tomcat (Deseo utilizar 
el paquete Tomcat)**.
* El instalador pregunta si se desea instalar el **SGDB Postgresql** o utilizar 
uno ya instalado. Para esta opción presionar el número **2** que indica la
opción **I want to use an existing PostgreSQL database**.
* Luego el instalador indica que se desea instalar nuevas bases de datos,
pregunta si se desean sobrescribir si en caso existieran. Presionamos la tecla 
**y**.
* Se procede a la configuración de los servicios, tanto los nuevos a instalar 
como los instalados anteriormente. Primero preguntará el puerto por el que
escuchará **Apache Tomcat**, se dejará el por defecto **8080**, solo presionar 
enter.
* La siguiente configuración es la del puerto por el cual se apagará **Apache
Tomcat**, se dejará la por defecto **8005** presionar enter.
* Luego se debe de especificar el directorio en donde se encuentran los 
archivos binarios de postgresql. Los archivos binarios que necesita son: *psql,
pg_restore, vacuumdb*. Estos archivos se encuentran ubicados en la ruta 
**/usr/bin/** por lo tanto se debe digitar esta ruta en el prompt y presionar 
enter.
* Se procede a configurar los parámetros específicos de la base de datos. La
primera pregunta es escribir la IP o el Host de Postgresql, por defecto coloca 
la IP 127.0.0.1 lo cambiaremos por la palabra **localhost**.
* La segunda opción es el puerto del gestor, por defecto aparece el **5432** 
así que presionar enter.
* Como ultima opción para la configuración de Postgresql se pide la contraseña 
asignada al usuario postgres, para este paso se debe de escribir la contraseña 
cambiada en el primer paso; es decir escribir **postgres**. La contraseña se 
deberá escribir dos veces para confirmar que la contraseña es correcta.
* Ahora el instalador pregunta si se desea instalar las bases de datos de
ejemplo; en este caso ya que no son necesarias presionar **n** y luego 
presionar enter.
* Todos los pasos anteriores solo han sido para la preparación de la 
instalación, en este ultimo paso vamos a confirmar el inicio de la instalación 
para realizar esta acción presionar y y luego enter.
* Con este paso se procede a la instalación. Aparecerá una barrita de avance 
de la instalación. Este paso puede tardar algunos minutos, por favor no 
presionar ninguna tecla ni cancelar la instalación. Esperar hasta que el 
instalador realice la siguiente pregunta:

        For more information please visit: www.jaspersoft.com/heartbeat
* Presionar el tecla **n** y luego enter. Para finalizar la instalación.
* Ahora se procede a levantar el servicio del JasperReports, para estar seguros
que la instalación se ha realizado correctamente. Como **usuario root**
ubicarse en el directorio de instalación del JaspeReports Server que es 
**/opt/jasperreports-server-cp-5.x.x/** con la siguiente sentencia:

        cd /opt/jasperreports-server-cp-5.x.x
* Ejecutar la siguiente sentencia para levantar el servicio:

        ./ctlscript.sh start
* Abrir el navegador de su preferencia y probar la siguiente url
http://localhost:8080/jasperserver/login.html deberá aparecer la pantalla 
de inicio de sesión.Para iniciar sesión como el usuario administrador en el 
área de inicio de sesión escribir la siguiente información: *usuario->
jasperadmin ; contraseña -> jasperadmin*.

###Carga de los reportes
* Para importar los reportes necesarios para la instalación de los módulos del 
SIAPS como **usuario root** ubicarse en la carpeta de instalación del 
**JasperReports Server** y entrar al directorio *buildomatic*  con la siguiente 
sentencia:

        cd /opt/jasperreports-server-cp-5.x.x/buildomatic
* Copiar en este directorio el .ZIP proporcionado con todos los reportes
utilizados y ejecutar:

        ./js-import.sh --input-zip NOMBRE_DEL_ARCHIVO.zip

* Esperar a que termina de importar los reportes y al terminar quitarle la 
contraseña al usuario postgresql siempre como **usuario postgres**

        psql
        psql (9.1.9)
        Digite <<help>> para obtener ayuda.
        
        postgres=#ALTER USER postgres WITH PASSWORD '';
        ALTER ROLE
        postgres=#\q

###Crear script para iniciar JasperReports con el sistema
* Para que al reiniciar el sistema JasperReports pueda iniciar automáticamente 
se debe de crear un script para que realice esta acción. Para ello como 
**usuario root** ubicarse en el directorio **/etc/init.d/** en donde se 
creara un archivo denominado **jasperreports** con el siguiente contenido:

        #!/bin/sh
        
        ### BEGIN INIT INFO
        # Provides:          jasperreports
        # Required-Start:    $all
        # Required-Stop:     $local_fs $syslog
        # Default-Start:     2 3 4 5
        # Default-Stop:      0 1 6
        # Short-Description: starts the the Jasper Reports service
        # Description:       starts Jasper Reports using start-stop-daemon
        ### END INIT INFO
        # Inicia el JasperServer
        case "$1" in
        'start')
                /opt/jasperreports-server-cp-5.x.x/ctlscript.sh start
                ;;
        'stop')
                /opt/jasperreports-server-cp-5.x.x/ctlscript.sh stop
                ;;
        'restart')
                /opt/jasperreports-server-cp-5.x.x/ctlscript.sh restart
                ;;
        'status')
                /opt/jasperreports-server-cp-5.x.x/ctlscript.sh status
                ;;
        *)
                echo "Usage: $0 { start | stop | restart | status}"
                ;;
        esac
        exit 0
* Salir y guardar el archivo. Ahora se procede a insertar el servicio en la 
configuración del sistema, esto se realiza con la siguiente sentencia: 

        insserv jasperreports
* Luego ejecutar la siguiente sentencia para saber si se creo correctamente le 
servicio:

        ls /etc/rc* | grep jasperreports

###Cambiar contraseña del JasperReports
* Para cambiar la contraseña del usuario administrador del JasperReports se 
debe iniciar sesión con el usuario descrito en el apartado anterior. Desde el 
menú dirigirse a Administrar → Usuarios y editar al usuario con la nueva 
contraseña.


4. Instalación y configuración del SIAPS.
---------------------------------------
La instalación puede realizarse de dos forma:

* Clonando el proyecto desde el servidor git.salud.gob.sv
* Copiando el proyecto directamente en el directorio raiz.

###Clonando el proyecto desde el servidor git.salud.gob.sv
* Clonar el repositorio **git@git.salud.gob.sv:SIAPS/siaps.git**
* Descargar el el archivo **composer.phar** como **usuario normal** con la
siguiente sentencia:

        curl -s https://getcomposer.org/installer | php

* Si es un usuario para **desarrollo** puede realizar una de las siguientes 
opciones:
 * Crear una nueva rama para trabajar en ella con la siguiente sentencia:

        git checkout -b nombreRama
 * Si ya posee una rama simplemente intercambiarse de rama con la siguiente
sentencia:

        git checkout nombreRama
* Si es para **producción** no realizar cambio de rama y dejarla en la rama 
master.
* Agregar el **parameters.yml** en el directorio **app/config/** con un 
contenido similar al siguiente:

        parameters:
            database_driver: pdo_pgsql
            database_host: nombreHost
            database_port: ''
            database_name: nombreBase
            database_user: usuarioBase
            database_password: contraseñaBase
            mailer_transport: smtp
            mailer_host: localhost
            mailer_user: null
            mailer_password: null
            locale: es_SV
            secret: df1ca40cfc425c4f34e654696720435a044b9ca9
            database_path: null
* Cambiar los parámetros por los datos que se realizaron en la creación de la 
base de datos.
* Agregar un archivo llamado **_jasperserverreports.php** para la configuración 
del Jasper Server Report en la ruta 
**src/Minsal/SiapsBundle/Util/JasperReport/** con la siguiente estructura:

        <?php
        define('JASPER_USER', 'usuario_jasper_server');
        define('JASPER_PASSWORD', 'contraseña_del_usuario');
        define('JASPER_URL','URI DEL SERVICIO algo similar a -> http://localhost:8080/jasperserver/services/repository?wsdl');
        ?>
* Crear los directorios cache/ , logs/ e /imagenes con la siguiente sentencia:

        mkdir -p app/cache app/logs web/imagenes/

* Siempre como **usuario normal** ejecutar:

         php composer.phar update
* Aplicar las acl al directorio cache y logs:

        setfacl -R -m u:www-data:rwx -m u:`whoami`:rwx app/cache/ app/logs/ web/imagenes/
        setfacl -dR -m u:www-data:rwx -m u:`whoami`:rwx app/cache/ app/logs/ web/imagenes/

###Creando el Virtual Host
* Como **usuario root** ejecutar:

        grep NameVirtualHost /etc/apache2/ports.conf
* Aparecerá algo similar a lo siguiente:

 1. NameVirtualHost 192.168.1.1:80
 2. NameVirtualHost *:80
* El caso 1 indica que NameVirtualHost está configurado en la IP 192.168.1.1 en
el puerto 80. Para el caso 2, NameVirtualHost está configurado para todas las 
direcciones IP configuradas en el servidor en el puerto 80.
* Esta dirección IP se repetirá en cada VirtualHost que se cree. Por lo que es 
importante colocar el valor indicado.
* Como usuario root, moverse a la carpeta:

        cd /etc/apache2/sites-available/
* Con un editor de texto crear el archivo **siaps.localhost** con el siguiente
contenido:

        # Inicio del archivo
        <VirtualHost VARIABLE_RETORNADA>
        ServerName siaps.localhost
        DocumentRoot /var/www/siaps/web
        DirectoryIndex app.php
        <Directory /var/www/siaps/web >
                Options Indexes FollowSymLinks MultiViews
                AllowOverride All
                Order allow,deny
                allow from all
        </Directory>
        ErrorLog ${APACHE_LOG_DIR}/siaps.localhost-error.log
        # Possible values include: debug, info, notice, warn, error, crit,
        # alert, emerg.
        LogLevel warn
        CustomLog ${APACHE_LOG_DIR}/siaps.localhost-access.log combined
        </VirtualHost>
        # Fin del archivo
* Guardar y salir del archivo. Luego, como **root** ejecutar:

        a2ensite siaps.localhost
* Habilitar el modo de reescritura con la siguiente sentencia:

        a2enmod rewrite
* Reiniciar el servicio de Apache
        /etc/init.d/apache2 restart
* Se debe agregar en el archivo **/etc/hosts** la IP junto con el ServerName 
del Virtual Host. La linea debe ser parecida a la siguiente:

        X.X.X.X       siaps.localhost

* Para el caso de todas las maquinas clientes. Agregar la línea anterior en el 
archivo **/etc/hosts** para que puedan acceder a ella.
* Probar desde un navegador (recomendado Iceweasel) la siguiente url: 
*http://siaps.localhost/* y deberá aparecer la página de inicio de sesión del 
sistema.