# adminportal

AdminPortal is a Laravel-based sample admin portal project.

## Requirements
- PHP >= 8.0
- Composer
- MySQL database

## Installation
1. Clone the repository:
   git clone https://github.com/yourusername/adminportal.git

2. cd adminportal

3. Install dependencies
   composer install

4. cp .env.example .env

5. Update your .env file with your database credentials,env variables as follows.
    DB_HOST
    DB_PORT
    DB_DATABASE
    DB_USERNAME
    DB_PASSWORD

6. Run Migration of database
   php artisan migrate

7. Seed the Database for login info
   I have added seed for admin login as below, if needed you can change it as required
   User name:admin
   Password:Admin@123

   Note: Mannually you can not insert the password, it is key based hash password i have checked durig the login process.

8. Run the application in 
   http://localhost/adminPortal/public/login