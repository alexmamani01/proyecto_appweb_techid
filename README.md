# Proyecto Web - Tecnicatura en Programación

Este proyecto es una página web desarrollada como parte de la materia **Programación Web** de la Tecnicatura en Programación. Permite la gestión de productos y categorías, incluyendo carga, edición, eliminación y visualización en un entorno moderno y responsive.Incluye un home donde se muestran los productos de venta del ecommerce ficticio ficticia TECHID

## Características principales
- Gestión de productos (alta, baja, modificación, listado)
- Gestión de categorías (alta, baja, modificación, listado)
- Subida de imágenes para productos
- Visualización de productos en tarjetas (grid y tabla)
- Filtros por categoría
- Menú de navegación moderno
- Uso de PHP, MySQL, HTML5, CSS3 y Docker

## Estructura del proyecto
```
MiProyecto/
├── assets/
│   ├── css/
│   │   └── estilos.css
│   ├── img/
│   └── js/
├── backend/
│   ├── categorias/
│   └── productos/
├── class/
│   ├── database.php
│   ├── productos.php
│   └── categorias.php
├── views/
│   └── home.html
├── index.html
├── docker-compose.yml
├── Dockerfile
└── README.md
```

## Tecnologías utilizadas
- **PHP** (backend)
- **MySQL** (base de datos)
- **HTML5/CSS3** (frontend)
- **JavaScript** (validaciones y mejoras de UX)
- **Docker** (entorno de desarrollo y despliegue)

## Instalación y ejecución-si quieres probarlo en tu local!
1. Clona el repositorio:
   ```
   git clone <url-del-repo>
   cd MiProyecto
   ```
2. Copia el archivo `.env.example` a `.env` y configura tus credenciales de base de datos.
3. Levanta los servicios con Docker:
   ```
   docker-compose up --build
   ```
4. Accede a la aplicación en tu navegador:
   - [http://localhost:5055](http://localhost:5055) (ajusta el puerto según tu configuración)

## Uso básico
- Desde el menú puedes navegar entre **Categorías** y **Productos**.
- Puedes agregar, modificar y eliminar productos y categorías.
- Los productos pueden tener imágenes y se visualizan en tarjetas.
- Puedes filtrar productos por categoría desde el menú o el filtro superior.

## Créditos
- Proyecto realizado por Alexandra Mamani para la materia **Programación Web** de la Tecnicatura en Programación de Teclab Instituto Técnico Superior

## Licencia
Este proyecto es de uso académico y libre para fines educativos.
