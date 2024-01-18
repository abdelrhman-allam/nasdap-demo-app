
# Laravel Docker/Sail Setup

This guide provides instructions on how to set up and run a Laravel project using Docker or Laravel Sail.

## Prerequisites

Before proceeding, make sure you have the following requirements installed on your system:

- Docker (for Docker setup)
- Docker Compose (for Docker setup)
- PHP (for Laravel Sail setup)

## Docker Setup

1. Clone the Laravel project repository:

   ````shell
   git clone

   ````

2. Navigate to the project directory:

   ````shell
   cd <project-directory>
   ````

3. Create a `.env` file:

   ````shell
   cp .env.example .env
   ````

4. Build and start the Docker containers:

   ````shell
   docker-compose up -d --build
   ````

5. Install dependencies:

   ````shell
   docker-compose exec laravel.test composer install
   ````

6. Generate an application key:

   ````shell
   docker-compose exec laravel.test php artisan key:generate
   ````

7. Access the application in your browser:

   ````
   http://localhost
   ````

8. You're ready to go! Start developing your Laravel application.

## Laravel Sail Setup

1. Clone the Laravel project repository:

   ````shell
   git clone <repository-url>
   ````

2. Navigate to the project directory:

   ````shell
   cd <project-directory>
   ````

3. Create a `.env` file:

   ````shell
   cp .env.example .env
   ````

4. Install dependencies:

   ````shell
   composer install
   ````

5. Generate an application key:

   ````shell
   php artisan key:generate
   ````

6. Start the Laravel Sail development server:

   ````shell
   ./vendor/bin/sail up
   ````

7. Access the application in your browser:

   ````
   http://localhost
   ````

8. You're ready to go! Start developing your Laravel application.
