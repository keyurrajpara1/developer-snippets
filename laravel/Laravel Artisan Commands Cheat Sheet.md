## Most Useful Laravel Artisan Commands

### Create Project

```bash
laravel new project_name
# Create a new Laravel project using Laravel Installer
```

```bash
composer create-project laravel/laravel project_name
# Create a new Laravel project using Composer
```

---

### Run Development Server

```bash
php artisan serve
# Start local development server
```

```bash
php artisan serve --host=127.0.0.1 --port=8000
# Start server on a specific host and port
```

---

### Generate Files

```bash
php artisan make:controller UserController
# Create a controller
```

```bash
php artisan make:controller Api/V1/UserController
# Create a controller inside Api/V1 folder
```

```bash
php artisan make:controller ProductController --resource
# Create a resource controller with CRUD methods
```

```bash
php artisan make:model Product
# Create a model
```

```bash
php artisan make:model Product -m
# Create model and migration
```

```bash
php artisan make:model Product -mf
# Create model, migration, and factory
```

```bash
php artisan make:model Product -mfs
# Create model, migration, factory, and seeder
```

```bash
php artisan make:migration create_products_table
# Create a migration file
```

```bash
php artisan make:seeder UserSeeder
# Create a seeder
```

```bash
php artisan make:factory ProductFactory
# Create a factory
```

```bash
php artisan make:middleware JwtVerify
# Create middleware
```

```bash
php artisan make:request RegisterRequest
# Create form request validation class
```

```bash
php artisan make:job SendEmailJob
# Create a queue job
```

```bash
php artisan make:event UserRegistered
# Create an event
```

```bash
php artisan make:listener SendWelcomeEmail
# Create an event listener
```

```bash
php artisan make:policy ProductPolicy --model=Product
# Create authorization policy for a model
```

```bash
php artisan make:command SendReminderEmails
# Create a custom Artisan command
```

---

### Database

```bash
php artisan migrate
# Run pending database migrations
```

```bash
php artisan migrate:rollback
# Rollback the last migration batch
```

```bash
php artisan migrate:rollback --step=1
# Rollback only one migration step
```

```bash
php artisan migrate:refresh
# Rollback all migrations and run them again
```

```bash
php artisan migrate:fresh
# Drop all tables and run migrations again
```

```bash
php artisan migrate:fresh --seed
# Recreate database and run seeders
```

---

### Seeders

```bash
php artisan make:seeder UserSeeder
# Create a new seeder
```

```bash
php artisan db:seed
# Run DatabaseSeeder
```

```bash
php artisan db:seed --class=UserSeeder
# Run a specific seeder
```

```bash
php artisan migrate:fresh --seed
# Drop all tables, run all migrations, and execute seeders
# Most useful during development
```

```bash
php artisan migrate:refresh --seed
# Rollback all migrations, migrate again, and execute seeders
```

---

### Queue

```bash
php artisan queue:work
# Start processing queued jobs
```

```bash
php artisan queue:work --once
# Process only one queued job
```

```bash
php artisan queue:restart
# Restart queue workers
```

```bash
php artisan queue:failed
# Show failed jobs
```

```bash
php artisan queue:retry all
# Retry all failed jobs
```

---

### Routes

```bash
php artisan route:list
# Display all registered routes
```

```bash
php artisan route:list --path=api
# Display only API routes
```

---

### Cache

```bash
php artisan optimize:clear
# Clear config, route, view, and application cache
```

```bash
php artisan config:cache
# Cache configuration files
```

```bash
php artisan config:clear
# Clear configuration cache
```

```bash
php artisan route:cache
# Cache routes for better performance
```

```bash
php artisan route:clear
# Clear route cache
```

```bash
php artisan view:clear
# Clear compiled Blade views
```

---

### Tinker

```bash
php artisan tinker
# Open Laravel interactive shell
```

Example:

```php
User::count();
User::first();
```

---

### Storage

```bash
php artisan storage:link
# Create symbolic link for public storage access
```

---

### Scheduler

```bash
php artisan schedule:run
# Run scheduled tasks manually
```

```bash
php artisan schedule:list
# List all scheduled tasks
```

---

### Testing

```bash
php artisan test
# Run all tests
```

```bash
php artisan test --filter=UserTest
# Run a specific test class or method
```

---

### API

```bash
php artisan install:api
# Install Laravel API scaffolding
```

---

### Information

```bash
php artisan --version
# Show Laravel version
```

```bash
php artisan key:generate
# Generate application APP_KEY
```

```bash
php artisan env
# Show current environment (local, production, etc.)
```
