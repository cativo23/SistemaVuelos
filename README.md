## Sistema de Vuelos

Usa **PHH 7.4** y **Laravel 7** (por que esta mas mamón y la verdad me dio error con oracle11g la version 6, con la 7 no tuve pedo)
####Requerimientos
_composer_ y npm _instalados_

###Pasos empezar a usar
1) Crear un nuevo Schema en Oracle con los siguientes Datos: 
    - DB_DATABASE=SistemaVuelos (creo que es el nombre de la conexion? no estoy seguro pero en mi caso si es el mismo nombre que la coneccion y me furula)
    - DB_USERNAME=vuelos
    - DB_PASSWORD=    
2) composer install
3) npm install && npm run dev
4) php artisan migrate     
5) ya despues de todo eso, php artisan serve
6) abren el navegador y le dan en enter dashboard
7) crean una cuenta arriba a la derecha en register y listo ya tienen cuenta para ver el "dashboard"(ahorita solo es esa pagina)

**No usaremos materialize ya que les dio problemas, compre esta plantilla, tengo una caperta con ejemplo y documentacion, me dicen para enviarselas** 

##RECORDAR
Para las migraciones tengan cuidado, se ejecutan las mas viejas primero, para empezar hay que empezar desde el modelo que no tiene referencia a otro y de ahi las demas, si hay un cambio no es como Django estas migraciones se tienen que hacer, todo a mano xd
