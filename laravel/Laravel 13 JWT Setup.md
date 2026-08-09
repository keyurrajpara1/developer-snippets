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

## Step X: Seed Test Users

Run:

```bash
php artisan db:seed

## Step 6: Start Development Server

```bash
php artisan serve --host=127.0.0.1 --port=8000
```

## Step 7: Verify API Installation

Test the default API route:

```http
GET http://127.0.0.1:8000/api/health
```

View registered API routes:

```bash
php artisan route:list --path=api
```

## Step 8: Install JWT Package

```bash
composer require tymon/jwt-auth
```

## Step 9: Publish JWT Configuration

```bash
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
```

## Step 10: Generate JWT Secret

```bash
php artisan jwt:secret
```

This command generates the JWT secret key and stores it in the `.env` file.

## Step 11: Configure API Guard

Edit `config/auth.php` and configure the API guard to use JWT authentication.

## Step 12: Create Authentication APIs

Create the following API endpoints:

* Register
* Login
* Logout
* Refresh Token
* Profile (Authenticated User)

## Step 13: Protect Routes

Apply JWT authentication middleware to protected routes:

```php
Route::middleware('auth:api')->group(function () {
    // Protected routes
});
```

## Step 14: Test APIs

Use Postman or another API client to test:

* Register
* Login
* Access Protected Routes
* Refresh Token
* Logout

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
