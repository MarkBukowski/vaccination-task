Vaccination Registration
=================================

This is a simple appointment registration app, used to register for vaccination appointments. Built on Win10 machine, tested on Chrome. Technologies used:
```
Laravel 8
Bootstrap 4
MYSQL database
PHP 7.3
```

## Features

* Staff registration and login
* Appointment creation, display, editing and deletion
* Export/Import to .csv feature (newest records at the top)
* Record list is only visible to registered staff member
* Appointment forms with validations
* Responsive design
* All information comes from DB


## Setup

**Clone Repository**

Navigate to the location you want to clone the repository via your terminal window and type in:

```
git clone https://github.com/MarkBukowski/vaccination-task
```

Jump up to the cloned project folder and install the Laravel framework alongside with necessary dependencies.

Make sure you have [Composer installed](https://getcomposer.org/download/)
and then run:

```
composer install
```
After the setup finishes, install npm:

```
npm install
```

If you receive any vulnerabilities when installing npm modules, after the command finishes, run:

```
npm audit fix
```

**Setup the .env file**

Copy the `.env.example` file and name it `.env`.

```
copy .env.example .env
```

**Generate key**

Update the `.env` file by generating a new key:

```
php artisan key:generate
```

**Run migrations**

Migrate the tadabase tables to update the newly created DB:

```
php artisan migrate
```

**Start the web server**

You can use Nginx or Apache, but the built-in web server works great:

```
php -S localhost:8000 -t public
```

## Authors
[MarkBukowski](https://github.com/MarkBukowski)
