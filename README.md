# Campus Events: Starter Repo

Starter app for **Agentic AI Engineering: Building Trustworthy Code for a Project** (Faculty of Computing, UTM).

It is a small Laravel 12 app that lists campus events. In Session 1 you will use a coding agent in Cursor to add one feature, **event registration with a seat limit**, following the 7-stage workflow: investigate, define, plan, implement, verify, review, explain.

## Pre-work (about 30 minutes, before Session 1)

You need PHP 8.2 or newer, Composer and Git. On macOS or Windows, [Laravel Herd](https://herd.laravel.com) installs PHP and Composer in one step.

```bash
git clone https://github.com/wanamra/starter-repo.git
cd starter-repo
composer run setup
php artisan test
```

`composer run setup` installs dependencies, creates `.env`, creates the SQLite database and loads the demo data. The pre-work is done when `php artisan test` shows every test passing.

Then:

1. Open the folder in Cursor.
2. Switch the chat to **Ask** mode and ask one question, for example: "What does this app do, and which files define an event?"
3. Run the app with `php artisan serve` and open http://127.0.0.1:8000.

Demo login: `student@example.com` / `password`.

## What is already here

| Part | Files |
| --- | --- |
| Events and registrations | `app/Models/Event.php`, `app/Models/Registration.php` |
| Database tables | `database/migrations/` |
| Test data | `database/factories/`, `database/seeders/DatabaseSeeder.php` |
| Event pages | `app/Http/Controllers/EventController.php`, `resources/views/events/` |
| Minimal login | `app/Http/Controllers/Auth/LoginController.php` |
| Tests (Pest) | `tests/Feature/`, `tests/Unit/` |

The demo data includes an event with plenty of seats, one with a single seat left, and one with zero seats.

## What is not here yet

Students cannot register for an event. That is the feature you will build, with an agent, in Session 1. Keep your briefs in `docs/briefs/`.

## Useful commands

| Task | Command |
| --- | --- |
| Run all tests | `php artisan test` |
| Run one test file | `php artisan test --filter=EventPages` |
| Reset the demo data | `php artisan migrate:fresh --seed` |
| Start the app | `php artisan serve` |

## Problems with setup?

- **`composer: command not found`**: install Composer, or Laravel Herd, then open a new terminal.
- **PHP version error**: run `php -v`. You need 8.2 or newer.
- **Tests fail straight after setup**: run `php artisan config:clear` and try again, then ask in the class chat.
