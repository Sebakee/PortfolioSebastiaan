# LaravelY

## Description

LaravelY is a personal, lightweight social-media demo built with Laravel. It showcases a working post, like and profile system and demonstrates common web app concerns such as authentication, file uploads and basic UX. The comment system is planned and tracked as future work.

Preview screenshots are available in the `preview photos` directory.

## Features

- Posts: create, edit and delete posts with optional images and simple formatting.
- Likes: toggle likes on posts with immediate UI feedback.
- Profiles: per-user profile pages with basic settings and post listings.
- Authentication: registration, login, password reset and basic gate checks.

## Tech stack

- Backend: Laravel (PHP 8+)
- Frontend: Blade templates, optionally Tailwind CSS + Vite when included
- Database: MySQL (configurable via `.env`)

## Requirements

- PHP 8.0 or later
- Composer
- Node.js and npm (only required for asset building)
- A database supported by Laravel (MySQL/MariaDB recommended)

The app targets a developer environment and is intended as a learning/personal project.

## Quick start

From the project root:

```bash
cp .env.example .env
composer install
npm install        # optional: only if you plan to build frontend assets
npm run build      # or `npm run dev` during development
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Visit `http://127.0.0.1:8000` to view the site.

## Configuration

Edit `.env` to configure database credentials, mailer settings, and other environment-specific options. Typical variables to check:

- `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
- `APP_URL` for correct local URLs

## Project structure and reuse

- Core application code lives in `app/` (models, controllers, providers).
- Routes are defined in `routes/web.php` and `routes/api.php` when present.
- Views are in `resources/views` and static assets in `resources/`.

You can reuse controllers or models in other Laravel projects by copying the relevant classes and their dependencies. The authentication scaffolding and post/like logic are intentionally simple to make adaptation straightforward.

## Development notes

- Screenshots: see the `preview photos` folder for UI references.
- Comment system: planned — TODO: implement comment model, controller and frontend.
- Tests: add feature and unit tests under `tests/` if you want CI coverage.

## Resources

- Laravel documentation: https://laravel.com/docs
- Tailwind CSS: https://tailwindcss.com/ (if used)

## License

This repository does not include an explicit license file. If you want to assign a license, add a `LICENSE` file at the project root (for example, MIT).

