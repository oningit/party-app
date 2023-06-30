# party-app
A platform that handle party live streaming. I believe that every night is a celebration. That’s why the platform offer entertainment in the city. Party Streaming aim to create a place where people can connect with each other, enjoy watching events, and have a good time.

INSTALLATION OF PARTY APP


1) LARAVEL v10 Installation. PHP version to >=8.1 in your server
--------------------------------------------------
	
2) LARAVEL ROLE AND PERMISSION Installation.
--------------------------------------------------
Install the package via composer:
	composer require spatie/laravel-permission

You should publish the migration and the config/permission.php config file with:
	php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

3) LARAVEL BREEZE Installation.
--------------------------------------------------

Install laravel breeze via composer:
	composer require laravel/breeze --dev

Next, run below command.
	php artisan breeze:install

And final install Dependencies
	npm install && npm run dev 

4) Install LaravelDaily/laravel-permission-ui Package
-------------------------------------------------
First, before installing this package, you need to have the spatie/laravel-permission installed and configured. We already done.
	composer require laraveldaily/laravel-permission-ui

	
5) UPLOAD the Party Folders and files.
-------------------------------------------------
6) IMPORT MySQL file(party_app.sql) in the database.
-------------------------------------------------
7) EDIT .env file for database connection
-------------------------------------------------
	DB_HOST=localhost
	DB_DATABASE=party_app
	DB_USERNAME=root
	DB_PASSWORD=
 
 8) Run migration with fresh
-------------------------------------------------
	php artisan migrate:fresh --seed

8) LOGIN ACCESS: (http://domain.com/login)
-------------------------------------------------
	Username: admin@admin.com
	Password: password

------------------------------------
ADMIN
------------------------------------
Only the Admin has access on these links:
	http://localhost/party/register
	http://localhost/party/permissions/users



NOTE: Only the Admin can register new user and give creator role access.
