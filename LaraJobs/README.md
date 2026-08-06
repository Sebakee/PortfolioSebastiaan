# LaraJobs

## Description

LaraJobs is a personal Laravel project that implements a small job-board focused on Laravel-related vacancies. It provides posting, searching and simple management of job listings. The UI is intentionally minimal so the code and features remain easy to inspect and reuse.

Preview screenshots are available in the `preview photos` directory.

The app supports a full-text style search over job title, tags and location so a single search term will show matching vacancies.

## Features

- Postings: create, edit and delete job vacancies including title, description, tags and optional image.
- Search: keyword search across title, tags and place (location).
- Simple admin/profile pages: manage your postings and view counts.
- Authentication: register, login, and basic auth-protected actions.

## Tech stack

- Backend: Laravel (PHP 8+)
- Frontend: Blade templates (optionally Tailwind + Vite)
- Database: MySQL / MariaDB (or SQLite for quick local testing)

## Requirements

- PHP 8.0 or later
- Composer
- Node.js and npm (only required for asset building)
- A database supported by Laravel (MySQL/MariaDB recommended)

This repository is a personal project and intended for learning and experimentation rather than production use.

## Quick start

From the project root:

```bash
cp .env.example .env
composer install
npm install        # optional: only if you plan to build frontend assets
npm run build      # or `npm run dev` for development
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Open `http://127.0.0.1:8000` in your browser.

## Development commands

If a `Makefile` is present, it may expose convenience commands similar to:

```bash
make install      # install PHP and JS dependencies
make build        # build frontend assets
make run          # run the app locally
make migrate      # run migrations
make seed         # seed the database
```

## Configuration

Edit `.env` to configure database credentials and other environment settings. Important variables to check:

- `APP_NAME`, `APP_ENV`, `APP_URL`
- `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
- `MAIL_MAILER`, `MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME`, `MAIL_PASSWORD`, `MAIL_FROM_ADDRESS`

For quick local testing you can use SQLite by setting `DB_CONNECTION=sqlite` and pointing `DB_DATABASE` to a local file.

## Example `.env` snippets

```ini
APP_NAME=LaraJobs
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=larajobs
DB_USERNAME=root
DB_PASSWORD=
```

## Project structure and reuse

- `app/` contains models, controllers and providers. Inspect `app/Models` and `app/Http/Controllers` to find the job posting and search logic.
- `routes/web.php` defines user-facing routes; `routes/api.php` may contain API endpoints.
- `resources/views/` contains Blade templates used by the UI.

You can extract the posting or search code and adapt it to other Laravel projects; the implementation is written to be small and readable.

## Searching behaviour

The search performs a substring match against the vacancy title, tags and place fields. It is deliberately simple (no external search engine) so it remains easy to understand and modify. For larger datasets consider integrating Scout + Meilisearch or Algolia.

## Development notes

- Screenshots are in `preview photos`.
- The app is a personal project and is not production hardened — do not expose it without adding proper security, rate-limits and validation.

## Team and project management

This project was developed by the repository owner as a learning exercise and portfolio piece. Work was done iteratively: building core posting and search features first, then improving UX and adding image support.

## Resources

- Laravel documentation: https://laravel.com/docs
- Tailwind CSS: https://tailwindcss.com/ (if used)
