# Laravel 13 REST API Template

![Laravel](https://img.shields.io/badge/Laravel-13-red)
![PHP](https://img.shields.io/badge/PHP-8.2-blue)
![Tests](https://img.shields.io/badge/tests-passing-brightgreen)

---

## 🇪🇸 Propósito

Este proyecto hace parte de mi portafolio como desarrollador backend.

Demuestra cómo diseño APIs REST limpias, mantenibles y listas para producción utilizando Laravel, aplicando buenas prácticas como:

- Versionado de APIs
- Separación de responsabilidades (Controller → Service → Resource)
- Validación con Form Requests
- Testing de endpoints críticos

---

## 🇺🇸 Purpose

This project is part of my backend engineering portfolio.

It demonstrates how I design clean, maintainable, and production-ready REST APIs using Laravel, following best practices such as:

- API versioning
- Separation of concerns (Controller → Service → Resource)
- Validation via Form Requests
- Test coverage for critical flows

---

## 🚀 Features

- API versioning under `/api/v1`
- Form Request validation
- API Resources for consistent JSON output
- Thin controllers with a service layer
- SQLite-first local setup
- Feature tests for main endpoints

---

## 🏗️ Architecture Overview

This project follows a simple layered architecture:

- Controllers → Handle HTTP requests/responses  
- Services → Contain business logic  
- Form Requests → Handle validation  
- Resources → Transform output responses  

This keeps controllers thin and improves maintainability and testability.

---

## 📁 Project Structure

```
app/
├── Http/
│   ├── Controllers/Api/V1
│   ├── Requests
│   └── Resources
├── Models
├── Services

routes/
└── api.php
```

---

## ⚙️ Requirements

- PHP 8.2+
- Composer
- SQLite

---

## 🛠️ Installation

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate:fresh --seed
php artisan serve
```

API available at:  
`http://127.0.0.1:8000`

---

## 🗄️ Local Database

SQLite is used for simplicity and zero-config local setup.

`.env`:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/project/database/database.sqlite
```

---

## 🔌 API Endpoints

Base: `/api/v1`

### Health

- `GET /api/v1/health`

### Products CRUD

- `GET /api/v1/products`
- `POST /api/v1/products`
- `GET /api/v1/products/{id}`
- `PUT /api/v1/products/{id}`
- `PATCH /api/v1/products/{id}`
- `DELETE /api/v1/products/{id}`

---

## 📦 cURL Examples

### Health

```bash
curl -X GET http://127.0.0.1:8000/api/v1/health
```

### List products

```bash
curl -X GET http://127.0.0.1:8000/api/v1/products
```

### Create product

```bash
curl -X POST http://127.0.0.1:8000/api/v1/products \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Mechanical Keyboard",
    "sku": "KEY-10001",
    "description": "Hot-swappable keyboard",
    "price": 129.99,
    "stock": 10,
    "is_active": true
  }'
```

---

## 🧪 Tests

```bash
php artisan test
```

Includes:

- Health endpoint test  
- Products CRUD tests  
- Validation tests  

---

## 🧠 Technical Decisions

- SQLite for fast local setup  
- `/api/v1` versioning for future evolution  
- Service layer to separate business logic  
- Testing for reliability  

---

## 🔮 Future Improvements

- Authentication (JWT / Sanctum)  
- Rate limiting  
- Swagger/OpenAPI docs  
- Docker support  
- CI/CD integration  

---

## 👤 Author

**David Fernando Sandoval Gómez**  
Software Architect · Tech Lead · Full Stack Developer  

📍 Cali, Colombia  
🌎 Available for remote work  

[LinkedIn](https://www.linkedin.com/in/davidfernandosandovalgomez)
