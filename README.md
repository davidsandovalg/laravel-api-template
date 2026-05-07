# Laravel 13 REST API Template

A clean, portfolio-ready Laravel 13 REST API template that demonstrates:

- API versioning under `/api/v1`
- Form Request validation
- API Resources for consistent JSON output
- Thin controllers with a service layer for business logic
- SQLite-first local setup
- Feature tests for main endpoints

## Requirements

- PHP 8.2+
- Composer
- SQLite

## Installation

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate:fresh --seed
php artisan serve
```

The API will run at: `http://127.0.0.1:8000`

## Local Database (Default)

SQLite is the default local database configuration.

`.env` should contain:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/project/database/database.sqlite
```

If `DB_DATABASE` is not set, Laravel defaults to `database/database.sqlite`.

## API Endpoints (v1)

Base prefix: `/api/v1`

### Health

- `GET /api/v1/health`

### Products CRUD

- `GET /api/v1/products`
- `POST /api/v1/products`
- `GET /api/v1/products/{id}`
- `PUT /api/v1/products/{id}`
- `PATCH /api/v1/products/{id}`
- `DELETE /api/v1/products/{id}`

## cURL Examples

### Health check

```bash
curl -X GET http://127.0.0.1:8000/api/v1/health
```

### List products

```bash
curl -X GET http://127.0.0.1:8000/api/v1/products
```

### Create a product

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

### Show a product

```bash
curl -X GET http://127.0.0.1:8000/api/v1/products/1
```

### Update a product

```bash
curl -X PUT http://127.0.0.1:8000/api/v1/products/1 \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Mechanical Keyboard Pro",
    "price": 149.99,
    "stock": 8
  }'
```

### Delete a product

```bash
curl -X DELETE http://127.0.0.1:8000/api/v1/products/1
```

## Validation Rules (Products)

- `name`: required on create, string, max 255
- `sku`: required on create, unique, string, max 100
- `description`: nullable string
- `price`: required on create, numeric, min 0
- `stock`: optional, integer, min 0
- `is_active`: optional, boolean

## Test Suite

Run tests with:

```bash
php artisan test
```

Included feature tests:

- Health endpoint response
- Products index/create/show/update/delete
- Product validation errors
