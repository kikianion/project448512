## Quick orientation for AI coding agents

This repository is a CodeIgniter 3 (legacy PHP) application called "Simela Gen2". The goal of this doc is to capture the concrete, discoverable patterns and workflows an AI should know to make safe, useful edits.

Key facts
- Framework: CodeIgniter 3 (see `index.php`, `system/`)
- App root: `application/` with MVC layout: `controllers/`, `models/`, `views/`
- App base controller: `application/core/MY_Controller.php` — most controllers extend it and the shared render helper lives here (`render()` loads `_appshell/1head.php` and `_appshell/1foot.php` when present).
- UI assets: `assets/AdminLTE-3.1.0/` (AdminLTE-based templates and plugins).

Important files to check before editing
- `application/config/config.php` — base_url, session, and other runtime flags (example: `composer_autoload = FALSE`).
- `application/config/database.php` — DB credentials and `mysqli` driver; many controllers/models assume a `user` table.
- `application/config/autoload.php` — libraries/helpers that are autoloaded (database is not autoloaded by default).
- `application/core/MY_Controller.php` — shared helpers, default `site_title` and `user` session handling; modify with care.
- `application/controllers/Login.php` and `application/models/User_model.php` — canonical login flow. `User_model::authenticate()` uses `password_verify()` and filters `status='active'`.
- `application/views/login.php` — shows usage of AdminLTE CSS/js and a public reCAPTCHA site key. Be mindful of hard-coded keys or secrets in views.

Conventions & patterns (concrete examples)
- Controllers extend `MY_Controller` not `CI_Controller` directly (example: `class Dashboard extends MY_Controller`).
- Use `$this->render('view', $data)` or `$this->load->view('path')` — `render()` prepends/appends appshell files when present.
- Models use `$this->db` and CodeIgniter query builder (see `User_model` methods: `authenticate`, `create_user`, `update_user`). Follow that style.
- Session data keys: `logged_in`, `user_id`, `email`, `name` (set in `Login::authenticate`).

Integration points & gotchas
- Database: `application/config/database.php` contains plaintext credentials in this tree (dev defaults: user `root`, password `1`, database `simela-gen2`). Treat as sensitive.
- Composer: `composer.json` exists but `composer_autoload` is FALSE in `config.php`. If you rely on `vendor/autoload.php` enable composer autoload or include the autoload manually.
- Front controller controls environment via `index.php` (ENVIRONMENT constant). Tests and error reporting depend on this.
- Views include AdminLTE assets via `base_url()`; ensure `config['base_url']` is set correctly for local dev.
- Login view contains a public reCAPTCHA site key. Do not expose private keys—search repo for `g-recaptcha` if modifying auth.

How to run / developer workflow (assumptions)
Note: the repo does not include an explicit dev server config. The following are reasonable starting commands; confirm with the maintainer for production-like steps.

- Install PHP dependencies (if you change composer packages):
  - `composer install` (assumes Composer is available and `composer.json` matches your PHP version).
- Quick local dev (built-in PHP server; adjust host/port and update `application/config/config.php` base_url):
  - `php -S 127.0.0.1:8000 -t .` (PowerShell: run from repo root) — then visit `http://127.0.0.1:8000/`
  - Alternatively, use Apache/nginx with document root pointed at the repo root so `index.php` runs.

When editing for the web, common chores
- Update `application/config/config.php` -> `base_url` for links/assets to work.
- If you change database layer or add models, prefer `application/models/*.php` and follow existing use of `$this->db` and `query_builder` style.
- If you add shared helpers/libraries, register them in `application/config/autoload.php` or load them in `MY_Controller::__construct()`.

Safety and review guidance for AI changes
- Avoid modifying `index.php` system bootstrapping unless necessary — it controls ENVIRONMENT and path constants.
- Don’t commit secrets (DB passwords, private reCAPTCHA keys). If you detect secrets in code, flag them and suggest moving to environment variables/config not checked into VCS.
- Preserve the `MY_` subclass prefix when adding core extensions (CodeIgniter convention).

Search shortcuts for quick context
- Login flow: `application/controllers/Login.php`, `application/models/User_model.php`, `application/views/login.php`
- Shared controller behavior: `application/core/MY_Controller.php`
- Configs: `application/config/{config.php,database.php,autoload.php}`

If anything here looks wrong or you want more detail (routes, custom helpers, deployment), tell me which area to expand and I will update this file.
