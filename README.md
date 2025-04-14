# LectuMania 📚

LectuMania es una aplicación web desarrollada con Laravel para gestionar libros, carritos de compras y usuarios. Este proyecto está diseñado para ofrecer una experiencia intuitiva y eficiente para la gestión de bibliotecas y compras en línea.

---

## 🚀 Características

- **Gestión de libros**: Agrega, edita y elimina libros desde un panel de administración.
- **Carrito de compras**: Permite a los usuarios agregar libros al carrito y gestionar sus compras.
- **Gestión de usuarios**: Registro, inicio de sesión y perfil de usuario.
- **Diseño responsivo**: Interfaz moderna y adaptable a dispositivos móviles.

---

## 🛠️ Tecnologías utilizadas

- **Framework**: [Laravel](https://laravel.com) (PHP)
- **Base de datos**: MySQL
- **Frontend**: Blade Templates, TailwindCSS
- **Autenticación**: Middleware de Laravel
- **Sesiones**: Gestión de carritos con sesiones

---

## 📂 Estructura del proyecto

```plaintext
LectuMania/
├── app/Http/Controllers/       # Controladores de la aplicación
├── app/Models/                 # Modelos de Eloquent
├── resources/views/            # Vistas Blade
│   ├── libros/                 # Vistas relacionadas con libros
│   ├── carrito/                # Vistas relacionadas con el carrito
│   ├── usuarios/               # Vistas relacionadas con usuarios
├── [web.php](http://_vscodecontentref_/1)              # Rutas de la aplicación
├── public/                     # Archivos públicos (CSS, JS, imágenes)
└── [README.md](http://_vscodecontentref_/2)                   # Documentación del proyecto