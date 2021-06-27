# Prueba técnica

## Instrucciones de uso
Para ejecutar la aplicación, después de descargar o clonar el repositorio, ejecute el siguiente comando dentro del directorio de la aplicación.
```
php artisan install
```
También se requiere del archivo `.env`, que podrá obtener una referencia de `.env.example`, dónde tendrá que cambiar por sus datos correspondientes.
`NOMBRE_DB`, `USERNAME` y `PASSWORD`.
Quedando algo similar a esto
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=mundo
DB_USERNAME=postgres
DB_PASSWORD=
```
Después tendrá que ejecutar las migraciones con:
```
php artisan migrate
```
También poblar la base de datos, con el seeder:
```
php artisan db:seed --class=DatabaseSeeder
```
Finalmente para correr la aplicación, ejecute lo siguiente
```
php artisan serve
```
Generalmente estará disponible en `http://127.0.0.1:8000`
de no ser así, en la consola saldrá especificado el puerto.

En dicha dirección podrá ver los endpoints disponibles.

api_key = `A1259859F52F715453FCD37E2F719`

### **Autor**

_*Carlos Fernández*_