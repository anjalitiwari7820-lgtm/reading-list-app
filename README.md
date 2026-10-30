# Reading List App

A simple Reading List web application built with Laravel and PHP. It helps users organize their books and track their reading progress.

## Features

- View all books in the reading list.
- Add new books with title, author, and reading status.
- Edit existing book details.
- Delete books with a confirmation prompt.
- Search books by title or author.
- Filter books by reading status.
- Dashboard showing total books and counts for each reading status.
- Display the number of books matching the current search and filters.
- Colourful status badges for easy identification.
- Responsive layout for mobile screens.
- Form validation to prevent invalid book entries.
- Store book data using an SQLite database.
- Simple, user-friendly interface with pastel purple styling.

## Technologies Used

- PHP
- Laravel
- SQLite
- HTML
- CSS
- Blade Templates
- Git and GitHub

## Reading Status Options

- **To Read** — Books you plan to read.
- **Reading** — Books you are currently reading.
- **Finished** — Books you have completed.

## Installation and Setup

### Prerequisites

Install PHP, Composer, and the required PHP extensions for Laravel.

### Steps

1. Clone or download this repository.
2. Open the project folder in a terminal.
3. Install dependencies:

   ```bash
   composer install
   ```

4. Create your environment file:

   ```bash
   cp .env.example .env
   ```

   On Windows, you can also copy `.env.example` and rename the copy to `.env`.

5. Generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Make sure the SQLite database file exists at `database/database.sqlite` and that `.env` is configured to use SQLite.

7. Run database migrations:

   ```bash
   php artisan migrate
   ```

8. Start the development server:

   ```bash
   php artisan serve
   ```

9. Open `http://127.0.0.1:8000` in your browser.

## AI Usage

AI assistance was used to help understand Laravel concepts, troubleshoot errors, improve the application, and develop parts of the project. The code was reviewed and tested during development.

## License

This project was developed as a learning project.