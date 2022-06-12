### Restfull API Laravel With MySQL

#### Requirements
1. Composer
2. XAMPP

#### Setup Project
1. Install dependency using command `composer install`
2. Create Database With Name `politeknik`
3. Setting Database in `.env`
4. Generate new key using command `php artisan key:generate`
5. Migrate Database using command `php artisan migrate`
6. Running Server using Command `php artisan serve`
7. Done.

#### Test Endpoint
- GET All   : `http://127.0.0.1:8000/api/mahasiswa`
- GET by id : `http://127.0.0.1:8000/api/mahasiswa/{id}`
- POST      : `http://127.0.0.1:8000/api/mahasiswa/`
- PUT       : `http://127.0.0.1:8000/api/mahasiswa/{id}`
- DELETE    : `http://127.0.0.1:8000/api/mahasiswa/{id}`
