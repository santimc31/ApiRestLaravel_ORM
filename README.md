# API REST Laravel - CavoshCafe

Proyecto API REST en **Laravel** para gestionar clientes y códigos de verificación usando **Eloquent ORM**.

---

## 1️⃣ Requisitos

- PHP >= 8.0  
- Composer  
- MySQL o MariaDB  
- Laravel 10.x  
- Postman o cliente HTTP

---

## 2️⃣ Instalación y Configuración

1️⃣ **Clonar o copiar el proyecto** en tu máquina.  

2️⃣ **Instalar dependencias**:

composer install



3️⃣ **Crear base de datos**:

CREATE DATABASE CavoshCafe;



4️⃣ **Configurar `.env`** con tus datos:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=CavoshCafe
DB_USERNAME=root
DB_PASSWORD=



5️⃣ **Generar clave de Laravel**:

php artisan key:generate


6️⃣ **Ejecutar migraciones**:

php artisan migrate


7️⃣ **Iniciar servidor**:

php artisan serve



Por defecto la API estará en:  
http://127.0.0.1:8000


---

## 3️⃣ Endpoints de la API

### Clientes

| Método | Ruta                  | Descripción               |
|--------|---------------------|---------------------------|
| POST   | /api/cliente/store   | Registrar nuevo cliente   |
| POST   | /api/cliente/login   | Login de cliente          |
| PUT    | /api/cliente/update/{id} | Actualizar cliente existente |

### Códigos

| Método | Ruta                  | Descripción                  |
|--------|---------------------|-------------------------------|
| POST   | /api/codigo/generar | Generar código de verificación |
| POST   | /api/codigo/validar | Validar código de verificación |

---

## 4️⃣ Ejemplos de uso

### Registrar cliente

POST /api/cliente/store
Body JSON:
{
"nombres": "Juan Perez",
"correo": "juan@example.com",
"passwordd": "123456"
}



### Login cliente

POST /api/cliente/login
Body JSON:
{
"correo": "juan@example.com",
"passwordd": "123456"
}


### Generar código

POST /api/codigo/generar
Body JSON:
{
"correo": "juan@example.com"
}


### Validar código

POST /api/codigo/validar
Body JSON:
{
"cliente_id": 1,
"codigo": 1234
}



## 5️⃣ Notas importantes

- Todos los Requests usan validación y `authorize()` devuelve `true`.  
- Las migraciones crean correctamente las tablas con relaciones `foreign key`.  
- Los Services manejan toda la lógica de negocio.  
- Se usa `Carbon` para fechas en códigos de verificación.  

---