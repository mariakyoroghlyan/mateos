# Website using PHP

A web library application built with [CodeIgniter 4](https://codeigniter.com), a lightweight and powerful PHP framework.

## Features

- MVC architecture (Controllers, Models, Views)
- Organized folder structure for scalability
- Composer-based dependency management
- Secure public directory for web access
- Built-in support for unit and feature testing

## Project Structure

```
app/        # Application code (Config, Controllers, Models, Views, etc.)
public/     # Web root (index.php, assets, etc.)
system/     # CodeIgniter core framework
tests/      # Unit and feature tests
writable/   # Cache, logs, uploads
.env        # Environment configuration
composer.json # Composer dependencies
phpunit.xml.dist # PHPUnit configuration
```

## Getting Started

### Prerequisites

- PHP 7.4 or newer
- [Composer](https://getcomposer.org/)
- Web server (Apache, Nginx, etc.)
- Supported database (MySQL, PostgreSQL, SQLite, etc.)

### Installation

1. **Clone the repository:**
   ```sh
   git clone https://github.com/yourusername/mateos.git
   cd mateos
   ```

2. **Install dependencies:**
   ```sh
   composer install
   ```

3. **Copy and configure environment:**
   ```sh
   cp .env.example .env
   # Edit .env to set your database and environment settings
   ```

4. **Set writable permissions:**
   ```sh
   chmod -R 0777 writable
   ```

5. **Configure your web server to point to the `public/` directory.**

### Running the Application

- Start the local development server:
  ```sh
  php spark serve
  ```
- Visit [http://localhost:8080](http://localhost:8080) in your browser.

## Testing

- **Configure your test database** in `.env` or `app/Config/Database.php`.
- **Run tests:**
  ```sh
  ./phpunit
  ```
  Or on Windows:
  ```sh
  vendor\bin\phpunit
  ```

- **Generate code coverage:**
  ```sh
  ./phpunit --colors --coverage-text=tests/coverage.txt --coverage-html=tests/coverage/ -d memory_limit=1024m
  ```

See [tests/README.md](tests/README.md) for more details.

## Documentation

- [CodeIgniter 4 User Guide](https://codeigniter.com/user_guide/)
- [PHPUnit Documentation](https://phpunit.de/documentation.html)

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---

**Note:** For security, always configure your web server to serve from the `public/` directory only.
