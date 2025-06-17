# Blog API

A modern RESTful API built with Laravel for managing blog content, featuring a robust backend with Vite for frontend asset compilation.

## 🚀 Features

- **RESTful API Architecture** - Clean and intuitive API endpoints
- **Laravel Framework** - Built on Laravel's solid foundation
- **Vite Integration** - Modern frontend tooling for fast development
- **Database Migrations** - Version-controlled database schema
- **Seeding Support** - Easy database population for testing
- **Authentication Ready** - Built-in support for API authentication & JWT Auth

## 📋 Requirements

- PHP >= 8.2
- Composer
- Node.js >= 16.x
- npm 
- MySQL

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

### 3. Install Node.js Dependencies

```bash
npm install
```

### 4. Environment Configuration

```bash
cp .env.example .env
```

Edit the `.env` file and configure your database and other settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blogapi
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Run Database Migrations

```bash
php artisan migrate
```

### 7. Seed Database (Optional)

```bash
php artisan db:seed
```

## 🚀 Running the Application

### Development Mode

#### Start Laravel Development Server

```bash
php artisan serve
```

The API will be available at `http://localhost:8000`

### Production Build

#### Build Frontend Assets

```bash
npm run build
```

#### Optimize Laravel for Production

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 📚 API Documentation

### Base URL
```
http://localhost:8000/api
```

### Available Endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET    | `/posts` | Get all blog posts |
| GET    | `/posts/{id}` | Get specific post |
| POST   | `/posts` | Create new post |
| PUT    | `/posts/{id}` | Update post |
| DELETE | `/posts/{id}` | Delete post |


## 🧪 Testing

Run the test suite:

```bash
php artisan test
```

## 📁 Project Structure

```
blogapi/
├── app/                    # Application logic
├── bootstrap/              # Bootstrap files
├── config/                 # Configuration files
├── database/               # Migrations, seeders, factories
├── public/                 # Public assets
├── resources/              # Views, frontend assets
├── routes/                 # Route definitions
├── storage/                # Logs, cache, uploads
├── tests/                  # Test files
├── vendor/                 # Composer dependencies
├── node_modules/           # Node.js dependencies (ignored)
├── .env                    # Environment variables (ignored)
├── composer.json           # PHP dependencies
├── package.json            # Node.js dependencies
├── vite.config.js          # Vite configuration
└── README.md              # This file
```

## 🔧 Available Commands

### Laravel Artisan Commands

```bash
# Create new controller
php artisan make:controller PostController

# Create new model
php artisan make:model Post

# Create new migration
php artisan make:migration create_posts_table

# Create new seeder
php artisan make:seeder PostSeeder

# Clear application cache
php artisan cache:clear

# Clear configuration cache
php artisan config:clear
```

### NPM Scripts

```bash
# Start development server
npm run dev

# Build for production
npm run build

# Preview production build
npm run preview
```

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🆘 Support

If you encounter any issues or have questions:

1. Check the [Laravel Documentation](https://laravel.com/docs)
2. Check the [Vite Documentation](https://vitejs.dev/)
3. Open an issue in this repository

## 🔄 Development Workflow

### Daily Development

1. **Start your development environment:**
   ```bash
   php artisan serve
   npm run dev
   ```

2. **Make your changes** to the codebase

3. **Test your changes:**
   ```bash
   php artisan test
   ```

4. **Commit and push** your changes

### Database Changes

1. **Create migration:**
   ```bash
   php artisan make:migration add_column_to_posts_table
   ```

2. **Run migration:**
   ```bash
   php artisan migrate
   ```

3. **Rollback if needed:**
   ```bash
   php artisan migrate:rollback
   ```
---

**Built with ❤️ using Laravel & Vite**