# Blog API

A modern RESTful API built with Laravel for managing blog content, featuring a robust backend with Vite for frontend asset compilation and JWT authentication.

## 🚀 Features

- **RESTful API Architecture** - Clean and intuitive API endpoints
- **Laravel Framework** - Built on Laravel's solid foundation
- **Vite Integration** - Modern frontend tooling for fast development
- **Database Migrations** - Version-controlled database schema
- **Seeding Support** - Easy database population for testing
- **JWT Authentication** - Secure API authentication with JSON Web Tokens
- **CORS Support** - Cross-Origin Resource Sharing enabled

## 📋 Requirements

- PHP >= 8.2
- Composer
- MySQL/PostgreSQL/SQLite

## 📦 Dependencies

### PHP Dependencies (Composer)

#### Core Framework
- **laravel/framework** - The Laravel framework core
- **laravel/tinker** - Powerful REPL for Laravel

#### Authentication & Security
- **tymon/jwt-auth** - JSON Web Token authentication for Laravel

#### Build Tools
- **vite** - Next generation frontend tooling
- **laravel-vite-plugin** - Laravel plugin for Vite


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
| GET    | `/posts` | Get all blog posts | No |
| GET    | `/posts/{id}` | Get specific post | No |
| POST   | `/posts` | Create new post | Yes |
| PUT    | `/posts/{id}` | Update post | Yes |
| DELETE | `/posts/{id}` | Delete post | Yes |



### Status Codes

- `200` - OK
- `201` - Created
- `400` - Bad Request
- `401` - Unauthorized
- `403` - Forbidden
- `404` - Not Found
- `422` - Unprocessable Entity (Validation Error)
- `500` - Internal Server Error

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

### Optimization Commands

```bash
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

**Built with ❤️ using Laravel & Vite**