# Book Reviews App

This is a simple book review application built with Laravel and Tailwind CSS.

## Features

- View list of books
- View book details and reviews
- Add/edit/delete books
- Add/edit/delete reviews 
- Search books by title, author, genre etc.

## Models

- Book 
  - id
  - title
  - author 
  - description
  - genre
  - cover image

- Review
  - id
  - content
  - rating 
  - book_id

## Endpoints  

- `GET /books` - Get all books
- `GET /books/{id}` - Get single book
- `POST /books` - Create new book
- `PUT /books/{id}` - Update book
- `DELETE /books/{id}` - Delete book

- `GET /books/{id}/reviews` - Get reviews for book  
- `POST /books/{id}/reviews` - Create review for book
- `PUT /reviews/{id}` - Update review
- `DELETE /reviews/{id}` - Delete review

## Installation

- Clone the repo
- Run `composer install`
- Configure your database credentials in `.env` file
- Run migrations `php artisan migrate`
- Run seeders `php artisan db:seed`
- Start local dev server `php artisan serve` 

## Tech Stack

- [Laravel](https://laravel.com/)
- [MySQL](https://www.mysql.com/) 
- [Tailwind CSS](https://tailwindcss.com/)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
