<h1 align="center">
    Arka
</h1>

## Installation

1. Clone the repository.

```
git clone https://github.com/JSintos/AAF-Maker.git
```

2. Go inside the project directory.

```
cd Arka
```

3. Install the Composer dependencies.

```
composer install
```

4. Install the NPM dependencies.

```
npm install
```

4. Create a copy of the `.env.example` file and rename it to `.env`. DO NOT simply rename the `.env.example` file to `.env`.

5. Generate an app encryption key.

```
php artisan key:generate
```

6. Create an empty database for the project and name it `arka`.

7. Edit the value `laravel` on the property `DB_DATABASE` to `arka` in your `.env` file.

8. Run the database migrations.

```
php artisan migrate
```

## Contributors

[Joshua Salinas](https://github.com/joshuasalinas)  
[Joshua Sintos](https://github.com/JSintos)  
[Yumi Terayama](https://github.com/yumiterayama)  
[Anekiel Trinidad](https://github.com/anekieltrinidad)
