# Project Setup Guide

## Overview

This document provides step-by-step instructions to set up the Laravel project, along with placeholders for a demo video and screenshots.

---

## Setup Instructions

### Prerequisites

1. PHP >= 8.0
2. Composer
3. MySQL or any supported database
4. Node.js and npm (for frontend assets)

### Steps

1. Clone the repository:

    ```bash
    git clone https://github.com/adarshshah925/e-commerce.git
    cd e-commerce
    ```

2. Install dependencies:

    ```bash
    composer install
    npm install
    ```

3. Copy the `.env` file and configure it:

    ```bash
    cp .env.example .env
    ```

    Update the `.env` file with your database credentials and other configurations.

4. Generate the application key:

    ```bash
    php artisan key:generate
    ```

5. Run database migrations and seed database:

    ```bash
    php artisan migrate --seed
    ```

6. Serve the application:

    ```bash
    php artisan serve
    ```

    The application will be available at `http://localhost:8000`.

7. Compile frontend assets:

    ```bash
    npm run dev
    ```

8. Register a new user using frontend which is an admin user which can access customers, orders and other information

---

## Demo Video

[![Watch the video](https://via.placeholder.com/800x450.png?text=Demo+Video)](https://example.com/demo-video)

---
