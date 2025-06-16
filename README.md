# Inventory-Aip

A backend RESTful API system built with Laravel that allows a store to manage products, categories, and stock levels.

🚀 Features
Product & Category management

CRUD operations for products and categories

Validation for input fields

Timestamps on data entries

Category deletion prevention if in use

Pagination and filtering support

⚙️ Tech Stack
Backend: Laravel 10+

Database: MySQL / PostgreSQL

API Testing: Postman (optional)

Containerization (Bonus): Docker + Laravel Sail (optional)

📁 Project Structure
pgsql
Copy
Edit
├── app/
├── database/
│   └── migrations/
├── routes/
│   └── api.php
├── .env
├── composer.json
├── README.md
🛠️ Setup Instructions
1. Clone the Repository
bash
Copy
Edit
git clone https://github.com/your-username/inventory-api.git
cd inventory-api
2. Install Dependencies
bash
Copy
Edit
composer install
3. Create Environment File
bash
Copy
Edit
cp .env.example .env
Then configure your .env file:

ini
Copy
Edit
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventory
DB_USERNAME=root
DB_PASSWORD=your_password
4. Generate App Key
bash
Copy
Edit
php artisan key:generate
5. Run Migrations
bash
Copy
Edit
php artisan migrate
6. Serve the Application
bash
Copy
Edit
php artisan serve
API will be available at: http://127.0.0.1:8200

🧪 API Endpoints
🛍️ Products
Method	Endpoint	Description
GET	/api/products	List all products
GET	/api/products/1	Get product by ID
POST	/api/products	Create a new product
PUT	/api/products/1	Update a product
DELETE	/api/products/1	Delete a product

🗂️ Categories
Method	Endpoint	Description
GET	/api/categories	List all categories
POST	/api/categories	Create a new category

🧠 Extra Features (Bonus)
Filtering: GET /api/products?category=food

Pagination: GET /api/products?page=2

🐳 Docker Support (Optional)
If using Laravel Sail:

bash
Copy
Edit
./vendor/bin/sail up
Or with Docker Compose:

bash
Copy
Edit
docker-compose up -d
Make sure your .env is configured for Docker’s DB settings (use mysql as DB host).

