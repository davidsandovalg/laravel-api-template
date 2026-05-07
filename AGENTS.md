# AGENTS.md

## Purpose

This document defines guidelines for contributors and AI agents working on this repository.

The goal of this project is to provide a clean, maintainable and production-ready Laravel REST API template.

---

## Development Principles

- Follow Laravel conventions whenever possible
- Keep controllers thin
- Move business logic to services
- Use Form Requests for validation
- Use API Resources for response formatting
- Prefer clarity over cleverness

---

## Architecture

The project follows a layered architecture:

- Controllers → handle HTTP layer
- Services → handle business logic
- Requests → handle validation
- Resources → handle response transformation

---

## Local Setup

```bash
php artisan migrate:fresh --seed
php artisan serve
