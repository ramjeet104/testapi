# Submissions API

## Setup Instructions

1. Clone the repository.
2. Run `composer install`.
3. Copy `.env.example` to `.env` and configure your database settings.
4. Run `php artisan migrate` to create the necessary tables.
5. Start the queue worker: `php artisan queue:work`.

## Testing the API

- To submit data, make a `POST` request to `/api/submit` with the following JSON structure:
  ```json
  {
    "name": "John Doe",
    "email": "john.doe@example.com",
    "message": "This is a test message."
  }
