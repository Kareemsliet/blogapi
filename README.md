# Blog API

A modern RESTful API built with Laravel for managing blog content and JWT authentication.

## 🚀 Features

- **RESTful API Architecture** - Clean and intuitive API endpoints
- **Laravel Framework** - Built on Laravel's solid foundation
- **Database Migrations** - Version-controlled database schema
- **JWT Authentication** - Secure API authentication with JSON Web Tokens
- **CORS Support** - Cross-Origin Resource Sharing enabled
- **Media Uploads** - Easily manage media files
- **Translation Support** - Translatable and localization

## 📋 Requirements

- PHP >= 8.2
- Composer
- MySQL >= 8.0

## 📦 Dependencies

### PHP Dependencies (Composer)

#### Core Framework
- **laravel/framework** - The Laravel framework core
- **laravel/tinker** - Powerful REPL for Laravel

#### Authentication & Security
- **tymon/jwt-auth** - JSON Web Token authentication for Laravel


## 🛠️ Installation & Setup

### 1. Clone the Repository

```bash
git clone <repository-url>
cd blogapi
```

### 2. Install PHP Dependencies

```bash
composer install
```


### 4. Environment Configuration

```bash
cp .env.example .env
```

Edit the `.env` file and configure your database and other settings:

```env
# Application
APP_NAME="Blog API"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blogapi
DB_USERNAME=your_username
DB_PASSWORD=your_password

# JWT Configuration
JWT_SECRET=your_jwt_secret
JWT_TTL=60

FILESYSTEM_DISK=public

# CORS
CORS_ALLOWED_ORIGINS=*
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Generate JWT Secret

```bash
php artisan jwt:secret
```

### 7. Run Database Migrations

```bash
php artisan migrate
```

### 8. Seed Database (Optional)

```bash
php artisan db:seed
```
### 9.make storage link

```bash
php artisan storage:link
```


## 🚀 Running the Application

### Development Mode

#### Start Laravel Development Server

```bash
php artisan serve
```

#### Optimize Laravel for Production

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 🔌 API Documentation

### Base URL
```
http://localhost:8000/api/v1
```

### Authentication

This API uses JWT (JSON Web Tokens) for authentication. Include the token in the Authorization header:

```
Authorization: Bearer {your-jwt-token}
```

### Available Endpoints

#### Authentication Endpoints

| Method | Endpoint | Description | Auth Required |
|--------|----------|-------------|---------------|
| POST   | `/auth/register` | Register a new user | No |
| POST   | `/auth/login` | Login user | No |
| POST   | `/auth/logout` | Logout user | Yes |
| GET    | `/auth/me` | Get authenticated user | Yes |

#### Blog Post Endpoints

| Method | Endpoint | Description | Auth Required |
|--------|----------|-------------|---------------|
| GET    | `/posts` | Get all blog posts | yes |
| GET    | `/posts/{id}` | Get specific post | yes |
| POST   | `/posts` | Create new post | Yes |
| PUT    | `/posts/{id}` | Update post | Yes |
| DELETE | `/posts/{id}` | Delete post | Yes |


### Database Changes

1. **Create migration:**
   ```bash
   php artisan make:migration create_posts_table
   ```

2. **Run migration:**
   ```bash
   php artisan migrate
   ```

3. **Rollback if needed:**
   ```bash
   php artisan migrate:rollback
   ```

### Adding New API Endpoints

1. **Create controller:**
   ```bash
   php artisan make:controller Api/PostController --api
   ```

2. **Add routes in `routes/api.php`**

3. **Create tests:**
   ```bash
   php artisan make:test PostApiTest
   ```

## 🚀 Deployment

### Environment Setup

1. Set `APP_ENV=production`
2. Set `APP_DEBUG=false`
3. Configure production database
4. Set up proper JWT secrets
5. set up proper file system

### Optimization Commands

```bash
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

**Built with ❤️ using Laravel**