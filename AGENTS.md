# AGENTS.md

## Project

Laravel 13 API template for backend portfolio.

## Goal

Build a clean, professional REST API template demonstrating senior backend practices.

## Rules

- Keep the project simple and runnable locally with SQLite.
- Do not introduce unnecessary packages unless justified.
- Use Laravel conventions.
- Use API versioning under `/api/v1`.
- Use Form Requests for validation.
- Use API Resources for JSON responses.
- Use Services for business logic when useful.
- Keep controllers thin.
- Add tests for main endpoints.
- Update README after changes.

## Commands

- Run tests: `php artisan test`
- Run migrations: `php artisan migrate:fresh --seed`
- Start server: `php artisan serve`

## Deliverables

- Health endpoint
- Versioned API routes
- Example CRUD module
- FormRequest validation
- API Resources
- Basic tests
- Professional README
