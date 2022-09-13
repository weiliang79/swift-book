## Installation

- `git clone https://github.com/weiliang79/swift-book.git`
- `cd swift-book`
- `composer install`
-  `cp .env.example .env`
- `php artisan key:generate`
- edit MySQL server configuration on `.env` file
- `composer install`
- `npm install`

## Running

Vite
- `npm run dev`

Server
- `php artisan serve`
- Browse using URL `localhost:8000`

Or using XAMPP
- Open XAMPP and start server
- Browse using URL `localhost/swift-book/public`

## Production

Vite
- `npm run build`
