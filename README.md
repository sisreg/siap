 Sistema Integral de Atención al Paciente - SIAPS
====================================================

Sistema enfocado a la Atención del Paciente; que contiene todo el historial 
clínico de un paciente dentro del primer nivel de atención. Esto con el fin de
poder darle seguimiento en todas las áreas del establecimiento y así cualquier
personal autorizado pueda análizar la información clínica de un determinado 
paciente.

1) Modificaciones después de clonar
---------------------------------------
* Verificar si se tiene el archivo composer.phar. Si se encuentra pasar al siguiente paso; si no se 
tiene debe de realizar los siguientes pasos:
    ** Como usuario root instalar: aptitude install curl
    ** Como usuario root editar el archivo /etc/php5/cli/conf.d/suhosin.ini, cambiando: //Este paso no se realiza para debian Wheezy
            ;suhosin.executor.include.whitelist =
       Por:
            suhosin.executor.include.whitelist = phar
    ** Como usuario normal, se creará una nueva rama y para trabajar en ella. Ejecutar:
       git checkout -b nombreRama
    ** Como usuario normal ejecutar: curl -s https://getcomposer.org/installer | php
* Como usuario normal, se creará una nueva rama y para trabajar en ella. Ejecutar:
       git checkout -b nombreRama 
Solo si no realizo en el primer paso
* Agregar el parameters.yml en el directorio app/config/ con un contenido similar al siguiente:
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
    locale: es
    secret: df1ca40cfc425c4f34e654696720435a044b9ca9
    database_path: null
* Como usuario normal ejecutar: php composer.phar install
* Crear los directorios cache/ y logs/ dentro del directorio app/
* Aplicar las acl al directorio cache y logs:
setfacl -R -m u:www-data:rwx -m u:`whoami`:rwx app/cache/ app/logs/
setfacl -dR -m u:www-data:rwx -m u:`whoami`:rwx app/cache/ app/logs/
   ** Si no esta instalado acl se debe de instalar
* Realizar el virtual host y probar la URL para que aparezca la página principal de Symfony
