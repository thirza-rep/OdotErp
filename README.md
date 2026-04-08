# Odot ERP - Advanced Management System

Odot ERP is a powerful Enterprise Resource Planning application built with Laravel 11, Filament v3, and Docker Sail. It is designed with performance and scalability in mind, using Supabase as its primary cloud database and JWT for secure authentication.

---

## 🚀 Quick Start (Docker Environment)

### Prerequisites
- **Docker Desktop** (Installed and running)
- **Git**
- **Composer** (Local installation for initial setup, optional)

### 1. Installation
Clone the repository and enter the project folder:
```powershell
git clone https://github.com/thirza-rep/OdotErp.git
cd odoterp
```

### 2. Environment Configuration
Copy the `.env.example` to `.env` and adjust the variables.
```powershell
cp .env.example .env
```

**Critical Database Setup (Supabase External):**
Ensure your `.env` contains your Supabase connection strings:
```env
DB_CONNECTION=pgsql
DB_HOST=aws-1-ca-central-1.pooler.supabase.com
DB_PORT=6543
DB_DATABASE=postgres
DB_USERNAME=postgres.nvogyjpkexssgylorrni
DB_PASSWORD=Odoterp1234@
```

### 3. Running with Docker Sail
Build and start the containers in detached mode:
```powershell
docker compose up --build -d
```
*Note: Port conflict with Laragon? The project is configured to run on port **8080**.*

### 4. Initialization
Generate the application key and JWT secret inside the container:
```powershell
docker compose exec laravel.test php artisan key:generate
docker compose exec laravel.test php artisan jwt:secret
docker compose exec laravel.test php artisan migrate
```

---

## 🛠️ Main Tech Stack
- **Framework**: [Laravel 11](https://laravel.com/)
- **Admin Panel**: [Filament v3](https://filamentphp.com/) (Premium Dashboard)
- **Database**: [PostgreSQL (Supabase)](https://supabase.com/)
- **Auth**: [JWT-Auth](https://github.com/php-open-source-saver/jwt-auth)
- **Containerization**: [Docker Sail](https://laravel.com/docs/11.x/sail)
- **Cache/Session**: File (Optimized for Windows local/hybrid setups to eliminate Supabase latency)

---

## 🌐 Accessing the Application

- **Local Development**: [http://localhost:8080](http://localhost:8080)
- **Admin Dashboard**: [http://localhost:8080/admin](http://localhost:8080/admin)
  - **Default Email**: `admin@odoterp.com`
  - **Default Password**: `admin`
- **Mobile/Network Test**: Use your local IP (e.g., `http://172.20.10.14:8080`) from other devices on the same Wi-Fi.

---

## ⚡ Performance Optimization
To ensure the application runs at peak performance in the Docker environment, execute:
```powershell
# Caching everything
docker compose exec laravel.test php artisan optimize
# Optimizing Filament and Icons
docker compose exec laravel.test php artisan filament:optimize
docker compose exec laravel.test php artisan icons:cache
```

---

## 📦 Project Structure
- `app/Filament/`: Custom admin resources and widgets.
- `app/Models/`: Core data structures.
- `compose.yaml`: Docker service orchestration (App + Redis).
- `public/`: Assets and entry points.

---

## 📝 GIT Workflow
To sync changes with the main branch:
```powershell
git add .
git commit -m "Your descriptive message"
git push origin main
```

---

*Built with ❤️ for Odot ERP Team.*
