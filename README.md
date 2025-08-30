# Corpoturismo

Aplicación web para la gestión de llegadas y salidas de cruceros turísticos en la ciudad de Cartagena.  
El sistema cuenta con dos interfaces principales:

- **Administrador:** Programa los eventos (llegadas/salidas de cruceros).
- **Usuario:** Puede inscribirse en eventos y recibir un turno.

---

## 🛠️ Tecnologías utilizadas

- **Frontend:** HTML, CSS, Bootstrap, SweetAlert.  
- **Backend:** PHP puro (sin framework).  
- **Otros:** Librería JS para generación de PDF, librería para envío de correos (actualmente en desarrollo).

---

## 📂 Estructura del proyecto

No se utilizó una arquitectura específica.  
Cada sección cuenta con sus propias carpetas (controladores, vistas, estilos, etc.):

```
/admin
   ├── controladores
   ├── vistas
   ├── estilos

/user
   ├── controladores
   ├── vistas
   ├── estilos

/home
   ├── controladores
   ├── vistas
   ├── estilos
```

---

## 🔑 Acceso a la aplicación

El **registro de nuevas cuentas está temporalmente desactivado**.  
Para pruebas, utilice los siguientes datos de acceso:

### Administrador
- **Usuario:** `admin@correo.com`  
- **Contraseña:** `admin123`  

### Usuarios de prueba
- **Usuario:** `user1@correo.com` | **Contraseña:** `user123`  
- **Usuario:** `user2@correo.com` | **Contraseña:** `user123`  
- **Usuario:** `user3@correo.com` | **Contraseña:** `user123`  

---

## 🚀 Despliegue

El proyecto se desplegará en un hosting gratuito como **InfinityFree**.

---
