📘 Documentación Backend – API Laravel
🧾 Descripción General
Este proyecto consiste en una API REST desarrollada en Laravel, que permite gestionar:

🏢 Entidades
👤 Contactos asociados a una entidad

La API permite realizar operaciones CRUD completas, incluyendo validaciones avanzadas y control de datos.

🛠️ Tecnologías usadas:
⚙️ PHP 8.2
🚀 Laravel
🗄️ SQLite (configurable a MySQL)
🔎 Postman para pruebas
🌿 Git para control de versiones


🏗️ Arquitectura Implementada


✅ Separación de responsabilidades

Controllers → Lógica HTTP
Models → Acceso a base de datos
Form Requests → Validación
Migrations → Estructura de tablas


🗄️ Base de Datos

Se trabajó con SQLite.
Archivo ubicado en:
database/database.sqlite

Configuración en .env:
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite


🧱 Estructura de Tablas:

🏢 Tabla: entidades
Campos principales:
id
nombre (requerido)
nit (requerido)
direccion
telefono
email
notas
timestamps

👤 Tabla: contactos
Campos principales:
id
entidad_id
nombre
identificacion (única)
telefono
email
timestamps


🚀 Endpoints Disponibles
Base URL:
http://127.0.0.1:8000/api
🏢 Endpoints Entidades
🔹 Listar entidades
GET /api/entidades
🔹 Ver una entidad
GET /api/entidades/{id}
🔹 Crear entidad
POST /api/entidades


Body JSON:
{
  "nombre": "Empresa X",
  "nit": "123456",
  "direccion": "Calle 1",
  "telefono": "3000000000",
  "email": "empresa@test.com",
  "notas": "Observaciones"
}
🔹 Actualizar entidad
PATCH /api/entidades/{id}
🔹 Eliminar entidad
DELETE /api/entidades/{id}

Respuesta:

{
  "message": "Entidad eliminada correctamente"
}


👤 Endpoints Contactos
🔹 Crear contacto
POST /api/contactos
Validación importante:
identificacion es única
Si se intenta repetir:
{
  "message": "The identificacion has already been taken."
}
✔ Validación probada correctamente.


🧪 Pruebas Realizadas
Se validó completamente con Postman:
✅ GET
✅ POST
✅ PATCH
✅ DELETE
✅ Validación de campos obligatorios
✅ Validación de identificacion única
✅ Manejo correcto de errores 422

🌿 Flujo de Trabajo Git
Se siguieron las instrucciones solicitadas:
Clonar repositorio original

Crear rama con formato:
JIC_1152198816

Implementar cambios en esa rama
Crear repositorio público propio
Cambiar remote
Subir rama a GitHub personal
Mantener commits descriptivos


🧠 Decisiones Técnicas
✔ Uso de SQLite
Elegido por simplicidad en entorno local.

✔ Uso de Form Requests
Para mantener una arquitectura limpia.

✔ Uso de HTTP Status Codes
201 → Creación exitosa
200 → Actualización correcta
422 → Error de validación


▶️ Cómo ejecutar el proyecto

1️⃣ Clonar repositorio
git clone <url>

2️⃣ Instalar dependencias
composer install

3️⃣ Configurar .env

4️⃣ Ejecutar migraciones
php artisan migrate

5️⃣ Levantar servidor
php artisan serve


🎯 Resultado Final
Se entrega una API funcional, validad y estructurada. Traté de pensarlo con las mejores práctias que yo conozco y pensada también para escalar a futuro.


