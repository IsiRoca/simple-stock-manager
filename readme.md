# Simple Stock Manager

Simple Stock Manager is a simple Laravel app for managing your product stock & inventory control. 
Using this app you can easily see your product store status and its provides stock-taking and inventory management most simplistic way.

Simple Stock Manager Laravel App with Docker Environment

- [Requirements](#requirements).
- [Features](#features).
- [Installation](#installation).
- [Default API Access Data](#default-api-access-data).
- [User Settings](#user-settings).
- [Accessing the API](#accessing-the-api).
- [Useful Commands](#useful-commands).

## Requirements
Development environment requirements :
- [Make](https://www.gnu.org/software/make/)
- [Docker](https://www.docker.com) >= 17.06 CE
- [Docker Compose](https://docs.docker.com/compose/install/)

Setting up your development environment on your local machine:

## Features
- [Laravel 7.0](https://laravel.com/docs/7.x/)
- [Docker](https://www.docker.com) and [Docker Compose](https://docs.docker.com/compose/)
- [PHP 7.4](https://www.php.net/releases/7_4_0.php)
- [Authentication](https://laravel.com/docs/7.x/authentication)
- API
  - [API Resources](https://laravel.com/docs/7.x/eloquent-resources)
  - [Token authentication](https://laravel.com/docs/6.x/api-authentication)
  - Versioning
- [Blade](https://laravel.com/docs/7.x/blade)
- [Email Verification](https://laravel.com/docs/7.x/verification)
- [Localization](https://laravel.com/docs/7.x/localization)
- [Policies](https://laravel.com/docs/7.x/authorization)
- [Broadcasting](https://laravel.com/docs/7.x/broadcasting)
- [Cache](https://laravel.com/docs/7.x/cache)
- [Helpers](https://laravel.com/docs/7.x/helpers)
- [Mail](https://laravel.com/docs/7.x/mail)
- [Requests](https://laravel.com/docs/7.x/validation#form-request-validation)
- [Filesystem](https://laravel.com/docs/7.x/filesystem)
- [Horizon](https://laravel.com/docs/7.x/horizon)
- [Migrations](https://laravel.com/docs/7.x/migrations)
- [Providers](https://laravel.com/docs/7.x/providers)
- [Seeding & Factories](https://laravel.com/docs/7.x/seeding)
- [Testing](https://laravel.com/docs/7.x/testing)

Also, this project uses other tools like:
- [Horizon](https://laravel.com/docs/7.x/horizon)
- [Telescope](https://laravel.com/docs/7.x/telescope)
- [Bootstrap 4](https://getbootstrap.com/)
- [Font Awesome](http://fontawesome.io/)
- [Vue.js](https://vuejs.org/)
- [axios](https://github.com/mzabriskie/axios)
- [Redis](https://redis.io/)
- [PHP-CS-Fixer](https://github.com/FriendsOfPhp/PHP-CS-Fixer)
- [spatie/laravel-medialibrary](https://github.com/spatie/laravel-medialibrary)
- and many more soon...

## Installation
First, clone this repo:
```bash
$ git clone https://github.com/IsiRoca/simple-stock-manager.git simple_stock_manager
$ cd simple_stock_manager
```

Run automatically (you need to have '**make**' installed):
```bash
$ make install
```
All the installation process is **fully automatic** (yeap... it's magic!!).

This is a summary of the instructions that will be executed automatically:
```bash
$ cp .env.example .env
$ docker-compose run --rm --no-deps ssm-server composer install
$ docker-compose run --rm --no-deps ssm-server php artisan key:generate
$ docker-compose run --rm --no-deps ssm-server php artisan horizon:install
$ docker-compose run --rm --no-deps ssm-server php artisan telescope:install
$ docker-compose run --rm --no-deps ssm-server php artisan storage:link
$ docker run --rm -it -v $(pwd):/app -w /app node yarn
$ docker-compose up -d
```

and then... database migrations with test data
```bash
$ docker-compose run --rm ssm-server php artisan migrate
$ docker-compose run --rm ssm-server php artisan db:seed
$ docker run --rm -it -v $(pwd):/app -w /app node npm run dev
$ docker-compose run --rm ssm-server php artisan db:seed --class=DevDatabaseSeeder
```

This will create a new user that you can use to sign in:
```yml
email: superadmin@email.com
password: 1234
```

et voilá... l'installation est finie!!

Now you can access the application via [http://localhost:8000](http://localhost:8000).
(massa cara...)



**There is no need to run ```php artisan serve```. PHP is already running in a dedicated container** (more magic...).

## Default API Access Data
You can access to the API application with this default data:
```bash
 -- Default Token --
3in9X94Rmz7NLzsQpjhub7KFRhheplhVFDzQWGx9dAjGszopil9SGMZZollQ
```

## User Settings
Change your access data from:
```bash
http://YOUR-DOMAIN/settings/account
```

Change your password from:
```bash
http://YOUR-DOMAIN/settings/password
```

Copy your token from:
```bash
http://YOUR-DOMAIN/settings/token
```

## Accessing the API

Clients can access to the REST API. **API requests require authentication via token**. 

### Your token
You can create a new token in your user profile.
```bash
http://YOUR-DOMAIN/settings/token
```
### Authorization and parameters 
Then, you can use this token either as url parameter or in Authorization header:
```bash
# Url parameter
GET http://YOUR-DOMAIN/api/v1/posts?api_token=your_private_token_here

# Authorization Header
curl --header "Authorization: Bearer your_private_token_here" http://YOUR-DOMAIN/api/v1/products

# Pagination parameter
GET http://YOUR-DOMAIN/api/v1/products?page=1
```

### API routes
To list all the available routes for API :
```bash
$ docker-compose run --rm --no-deps ssm-server php artisan route:list --path=api
```

### Some API endpoints examples
You have a collection to use with [Postman](https://www.postman.com/downloads/) in the **.files** folder

You can do some of the following actions with the API:
- View all users, view specific user, create users or update users.
- View all products, view specific product, create products, delete products or update products.
- View all companies, view specific company, create companies, delete companies or update companies data.
- View all products type, view specific product by type, create products types, delete products types or update products types data.
- View all cities, view specific city, create cities, delete cities or update cities data.
- View all countries, view specific country, create countries, delete countries or update countries data.
- View products by city, view products by type, view companies by city or view cities by country.
- and many more posibilities...

#### Products
```bash
$ api/v1/products
$ api/v1/products/{product}
```

#### Products Types
```bash
$ api/v1/types
$ api/v1/types/{type}
$ api/v1/types/{type}/products
```

#### Users
```bash
$ api/v1/users
$ api/v1/users/{user}
$ api/v1/users/{user}/companies
$ api/v1/users/{user}/products
``` 

#### Cities
```bash
$ api/v1/cities
$ api/v1/cities/{city}
$ api/v1/cities/{city}/companies
$ api/v1/cities/{city}/products
```

#### Countries
```bash
$ api/v1/countries
$ api/v1/countries/{country}
$ api/v1/countries/{country}/cities
```

#### Companies
```bash
$ api/v1/companies
$ api/v1/companies/{company}
```

### API versions
API are prefixed by ```api``` and the API version number like so ```v1```.

Do not forget to set the ```X-Requested-With``` header to ```XMLHttpRequest```. Otherwise, Laravel won't recognize the call as an AJAX request.

## Useful commands

Clear Application Cache
```bash
$ docker-compose run --rm ssm-server php artisan cache:clear
```

Clear Route Cache
```bash
$ docker-compose run --rm ssm-server php artisan route:clear
```

Clear Configuration Cache
```bash
$ docker-compose run --rm ssm-server php artisan config:clear 
```

Clear Compiled Views Cache
```bash
$ docker-compose run --rm ssm-server php artisan view:clear
```

Seeding the database :
```bash
$ docker-compose run --rm ssm-server php artisan db:seed
```

Generating fake data :
```bash
$ docker-compose run --rm ssm-server php artisan db:seed --class=DevDatabaseSeeder
```

Generating backup :
```bash
$ docker-compose run --rm ssm-server php artisan vendor:publish --provider="Spatie\Backup\BackupServiceProvider"
$ docker-compose run --rm ssm-server php artisan backup:run
```

Starting job for newsletter :
```bash
$ docker-compose run ssm-server php artisan tinker
> PrepareNewsletterSubscriptionEmail::dispatch();
```

Running tests :
```bash
$ docker-compose run --rm ssm-server ./vendor/bin/phpunit --cache-result --order-by=defects --stop-on-defect
```

Running php-cs-fixer :
```bash
$ docker-compose run --rm --no-deps ssm-server ./vendor/bin/php-cs-fixer fix --config=.php_cs --verbose --dry-run --diff
```

Discover package
```bash
$ docker-compose run --rm --no-deps ssm-server php artisan package:discover
```

In development environnement, rebuild the database :
```bash
$ docker-compose run --rm ssm-server php artisan migrate:fresh --seed
```

Uninstall Simple Stock Manager:

Be careful please, this command remove all **ssm** containers, his data, and **all docker images**
```bash
$ make uninstall
```
## TODOs
- Add swagger
- Complete unit testing
- Complete backend and frontend
- Add more features to backend
- Add Bulma Template
- Add commands for automatization
- Add database cache
- and more things that can be interesting...

## Contributing

Do not hesitate to contribute to the project by adapting or adding features ! Bug reports or pull requests are welcome.

## License

This project is released under the [MIT](http://opensource.org/licenses/MIT) license.
