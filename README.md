<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Before start the project you should have these softwares XAMP server installed in your system
This project only have apis

## Steps to Run After cloning this repositary

-----Step 1: Set .ENV file
    
    APP_ENV=local
    APP_URL=http://localhost
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=authenticationdb
    DB_USERNAME=root
    DB_PASSWORD=

-----Step 2: Intsall dependencies <br>

    composer install

-----Step 3: Run this command in project terminal <br>

    php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

-----Step 4: Run migration <br>

    php artisan migrate

-----Step 5: Run command to start project <br>

    php artisan serve

## You can test API using postman
Step 1: Add these requests to your postman <br>

    http://127.0.0.1:8000/api/auth/register  
    http://127.0.0.1:8000/api/auth/login    
    http://127.0.0.1:8000/api/auth/logout   
    http://127.0.0.1:8000/api/auth/user  
    
Step 2: After register user, login user and copy token and paste it there:

![image](https://github.com/Adnan913/authentication_laravel/assets/54793380/831de4c9-16ba-4d76-8ed6-8545fd9ec9fa)


Now you can check authentications.
  

