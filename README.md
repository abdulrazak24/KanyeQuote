# Kanye Quotes API

This Laravel application provides a RESTful API to fetch random Kanye West quotes.

## Setup

### Requirements

-   PHP (>= 7.4)
-   Composer
-   Laravel (>= 8.x)
-   MySQL (or any other supported database)

### Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/your-username/kanye-quotes.git
    ```

2. cd kanye-quotes
3. composer install
4. cp .env.example .env
5. php artisan key:generate
6. php artisan migrate
7. php artisan serve
8. The application will be accessible at http://127.0.0.1:8000.
9. API Endpoints
   Get Random Quotes
   Endpoint: /api/kanye-quotes
   Method: GET
10.Endpoint: /api/kanye-quotes/refresh
   Method: GET
11.For feature and unit test use the below command.
   php artisan test
