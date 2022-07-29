## Catatan untuk aplikasi MoU :
1. Untuk fitur jenis kerjasama dimatikan, jika ingin menyalakan kembali Anda mungkin harus mengecek list folder dan file dibawah ini :
	- Folder database (migration mou, seeder.php[untuk mengisi otomatis data kerjasama])
	- Folder (app/Http/Controller/MouController.php, model MoU dan model Kerjasama)
	- Folder (resources/views/modals/tambahMoU.blade.php, resources/views/contents/MoU/edit.blade.php)
2. Jika ingin menambahkan fitur CRUD pada tabel kerjasamas Anda bisa mencopy-paste dari Controller dan views dari setting MoU. Tinggal menyesuaikan beberapa komponen seperti kolom database, dll.

## MoU Open Source - Installation

The requirements to Laravel MoU application is:

- **PHP - Supported Versions**: >= 8.0
- **Webserver**: Nginx or Apache
- **Database**: MySQL, or Maria DB

### Git Clone

```
$ git clone https://github.com/ambonxnobody/MemorandumOfUnderstanding.git
$ cd MemorandumOfUnderstanding
$ composer update
```

## Setup

**Important**: If you have not the .env file in root folder, you must copy or rename the .env.example to .env

#### Application URL

.env file

```
APP_URL=http://yourdomain.tld (you must use protocol http or https)
```

#### Language

Options: en | id

.env file

```
APP_LANG=en
```

#### Database

.env file

```

DB_CONNECTION=mysql
DB_HOST=XXXXXX
DB_PORT=3306
DB_DATABASE=XXXXX
DB_USERNAME=XXXX
DB_PASSWORD=XXXXX
```

**Remember**: Create the database for Laravel MoU before run artisan command.

```
php artisan migrate --seed
```

```
Application name: absensi
Homepage URL: URL (Same as APP_URL at .env)
```

#### Proxy

.env file

```
PROXY_PORT=
PROXY_METHOD=
PROXY_SERVER=
PROXY_USER=
PROXY_PASS=
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
