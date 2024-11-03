# 🎛️ Simple MES Module

A simplified Manufacturing Execution System (MES) module built with **Laravel 10**, providing essential functionalities for manufacturing processes. This project was created to follow 3 day development restriction.

## 🚀 Features

- **Dashboard**: Visual overview of key manufacturing metrics with interactive charts.
- **Production Tracking**: Full CRUD operations to manage production orders.
- **Quality Control**: Schedule inspections, record results, and generate reports.

## 🛠️ Tech Stack

- **Backend**: Laravel 10
- **Frontend**: Blade Templates, Tailwind CSS, Chart.js
- **Database**: MySQL
- **Server**: Nginx via Laragon

## ⚙️ Installation

1. **Navigate to the project directory:**

   ```bash
   cd mes_system

Install dependencies:

    composer install
    npm install

Copy .env file and generate app key:


    cp .env.example .env
    php artisan key:generate

Configure database in .env:

    DB_DATABASE=mes_system
    DB_USERNAME=root
    DB_PASSWORD=

Run migrations:

    php artisan migrate

Build assets:

    npm run dev

🎮 Usage

- Access the app via Laragon at http://mes_system.test
- Register/Login to explore features
- Dashboard displays real-time metrics with charts
- Manage Production Orders: Create, read, update, delete
- Handle Inspections: Schedule and record quality checks

📄 License

This project is licensed under the MIT License.
