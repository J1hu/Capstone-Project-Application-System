# Capstone-Project-Application-System
Bachelor of Science in Information Systems 4th year of La Verdad Christian College | Web-Based Application Information System

## Authors
- [J1hu](https://www.github.com/J1hu)
- [j-mode](https://www.github.com/j-mode)
- [AndreaMaurice](https://www.github.com/AndreaMaurice)
- [Tine-09](https://github.com/Tine-09)

## Modules (least to highest access level)
- Applicant/User's Module
- Evaluator/Program Head's Module
- Management Committee's Module
- Registrar Staff's Module
- Registrar/Admin Module

## Installation

1. Install the project with git
```
git clone https://github.com/J1hu/Capstone-Project-Application-System.git
```

2. Install Project Dependencies from Composer
```
composer install 
```

3. Install NPM Dependencies
```
npm install 
```

4. Rename .env.example to .env

5. Generate encryption key
```
php artisan key:generate
```

6. Create an empty database using XAMPP

7. Configure the .env file to allow connecting with the database

8. Run migration and seeder to populate the database
```
php artisan migrate:fresh --seed
```

9. Load TailwindCSS (do not close this terminal while running the project)
```
npm run dev
```

10. Run the project
```
php artisan serve
```

11. You can now login the default admin account on `/admin` route:
```
email: `admin@admin.com`
password: `password`
```

## License
[MIT](https://choosealicense.com/licenses/mit/)

