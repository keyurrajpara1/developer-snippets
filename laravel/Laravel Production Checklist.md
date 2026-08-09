# Laravel Production Checklist

## Environment

```env
APP_ENV=production
APP_DEBUG=false
```

* Never keep `APP_DEBUG=true` in production.
* Sensitive error details should not be exposed to users.

---

## Storage Link

Check whether the storage symlink exists.

Run:

```bash
php artisan storage:link
```

Used for:

```text
storage/app/public
      ↓
public/storage
```

Required for image and file uploads.

---

## Cache Configuration

```bash
php artisan config:cache
```

Cache configuration for better performance.

---

## Cache Routes

```bash
php artisan route:cache
```

Cache routes for better performance.

Note:
Do not use if route closures exist.

---

## Clear Old Cache

```bash
php artisan optimize:clear
```

Useful after deployment if unexpected issues occur.

---

## Generate Application Key

Verify:

```env
APP_KEY=
```

If missing:

```bash
php artisan key:generate
```

---

## Database Migration

Run pending migrations:

```bash
php artisan migrate --force
```

Required because production blocks migrations without `--force`.

---

## Queue Worker

If using queues, verify workers are running:

```bash
php artisan queue:work
```

Or restart workers after deployment:

```bash
php artisan queue:restart
```

---

## Scheduler

Verify cron job is configured:

```bash
* * * * * php /path/to/artisan schedule:run >> /dev/null 2>&1
```

Check scheduled tasks:

```bash
php artisan schedule:list
```

---

## File Permissions

Verify writable directories:

```text
storage/
bootstrap/cache/
```

Laravel must be able to write logs, cache, sessions, and uploaded files.

---

## Logs

Check for errors:

```text
storage/logs/laravel.log
```

---

## Environment Variables

Verify:

```env
APP_URL=
DB_DATABASE=
DB_USERNAME=
MAIL_MAILER=
MAIL_HOST=
MAIL_USERNAME=
MAIL_PASSWORD=
```

---

## API Testing

Verify key APIs:

* Login
* Register
* Password Reset
* File Upload
* Protected Routes

---

## Final Verification

```bash
php artisan about
```

Review:

* Environment
* Database connection
* Cache status
* Queue configuration
* Storage configuration

```
```
