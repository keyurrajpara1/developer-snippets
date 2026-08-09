# Laravel 13 JWT Authentication

## Step 1: Create Project

```bash
laravel new laravel_tymon_jwt_auth --no-interaction
```

## Step 2: Create MySQL Database

```sql
CREATE DATABASE laravel_tymon_jwt_auth;
```

## Step 3: Configure Database

Edit the `.env` file and update the database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_tymon_jwt_auth
DB_USERNAME=root
DB_PASSWORD=
```

## Step 4: Enable API Routes

```bash
php artisan install:api --without-migration-prompt --no-interaction
```

## Step 5: Run Migrations

```bash
php artisan migrate
```

## Step 6: Seed Test Users

Run:

```bash
php artisan db:seed
```

This will create test users using the configured factories and seeders.

## Step 7: Install JWT Package

```bash
composer require tymon/jwt-auth
```

## Step 8: Publish JWT Configuration

```bash
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
```

## Step 9: Generate JWT Secret

```bash
php artisan jwt:secret
```

This command generates the JWT secret key and stores it in the `.env` file.

## Step 10: Configure API Guard

Edit `config/auth.php` and configure the API guard to use JWT authentication.

Example:

```php
'guards' => [
    'api' => [
        'driver' => 'jwt',
        'provider' => 'users',
    ],
],
```

## Step 11: Start Development Server

```bash
php artisan serve --host=127.0.0.1 --port=8000
```

## Step 12: Verify API Installation

Test the default API route:

```http
GET http://127.0.0.1:8000/api/health
```

View registered API routes:

```bash
php artisan route:list --path=api
```

## Step 13: Create Authentication APIs

Create the following API endpoints:

* Register
* Login
* Logout
* Refresh Token
* Profile (Authenticated User)

## Step 14: Protect Routes

Apply JWT authentication middleware to protected routes:

```php
Route::middleware('auth:api')->group(function () {
    // Protected routes
});
```

Or if using a custom middleware:

```php
Route::middleware('jwt.verify')->group(function () {
    // Protected routes
});
```

## Step 15: Test APIs

Use Postman or another API client to test:

* Register
* Login
* Access Protected Routes
* Refresh Token
* Logout

## Production Notes

### Disable Debug Mode

```env
APP_DEBUG=false
```

Never expose detailed exception information in production.

### Create Storage Link

```bash
php artisan storage:link
```

Required when serving uploaded files from the public directory.

### Clear Cache

```bash
php artisan optimize:clear
```

Useful after deployments or configuration changes.

## Notes

### Common Errors

#### Error

```text
Target class [jwt.auth] does not exist
```

#### Solution

```bash
php artisan optimize:clear
```

---

#### Error

```text
JWT secret is not set
```

#### Solution

```bash
php artisan jwt:secret
```

---

#### Error

```text
Unauthenticated
```

#### Solution

Check:

* Authorization header is present
* Bearer token is valid
* API guard is configured correctly

---

#### Error

```text
SQLSTATE[HY000] [1049] Unknown database
```

#### Solution

Create the database:

```sql
CREATE DATABASE laravel_tymon_jwt_auth;
```

Then verify your `.env` configuration.
