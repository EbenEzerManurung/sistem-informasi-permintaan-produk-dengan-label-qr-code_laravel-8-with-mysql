
#sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql



Using Laravel framework and Mysql database
Aplikasi ini dibuat menggunakan Laravel 8 dan minimal PHP 7.4 olehkarena itu jika pada saat proses instalasi terdapat error karena versi dari PHP yang tidak support.

### Beberapa Fitur yang tersedia:
- Kelola akun user & hak akses
- Permintaan produk
  - import data summary order.xlsx
- Permintaan produksi
  - create permintaan produksi
  - confirm permintaan produksi
- Data produk
- Produk masuk
  - create data produk masuk
- Validasi produk
- Data cetak Qr code & print label Qr code
- Data produk keluar & print report produk keluar

## Instalasi
#### Via Git
```bash
git clone git@github.com:EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql.git
```

### Setup Aplikasi
Jalankan perintah 
```bash
composer update
```
atau:
```bash
composer install
```
Copy file .env dari .env.example
```bash
cp .env.example .env
```
Konfigurasi file .env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_ptrma
DB_USERNAME=root
DB_PASSWORD=
```
Generate key
```bash
php artisan key:generate
```
Migrate database
```bash
php artisan migrate
```
Menjalankan aplikasi
```bash
php artisan serve
```

## Screenshot 
## Register account

![App Screenshot](https://github.com/EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql/blob/main/screenshot/ss_register%20account.PNG?raw=true)

## Login

![App Screenshot](https://github.com/EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql/blob/main/screenshot/ss_login.PNG?raw=true)

## Dashboard admin

![App Screenshot](https://github.com/EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql/blob/main/screenshot/ss_dashboard%20admin.PNG?raw=true)

## add user

![App Screenshot](https://github.com/EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql/blob/main/screenshot/ss_add%20account.PNG?raw=true)

## data user

![App Screenshot](https://github.com/EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql/blob/main/screenshot/ss_data%20user.PNG?raw=true)

## Acces

![App Screenshot](https://github.com/EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql/blob/main/screenshot/ss_hak%20akses.PNG?raw=true)

## Dashboard ppic

![App Screenshot](https://github.com/EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql/blob/main/screenshot/ss_dashboard%20ppic.PNG?raw=true)

## Import summary order

![App Screenshot](https://github.com/EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql/blob/main/screenshot/ss_import.PNG?raw=true)

## Data permintaan produk

![App Screenshot](https://github.com/EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql/blob/main/screenshot/ss_daftar%20permintaan%20produk.PNG?raw=true)

## Data produk

![App Screenshot](https://github.com/EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql/blob/main/screenshot/ss_daftar%20produk.PNG?raw=true)

## Create permintaan produksi
![App Screenshot](https://github.com/EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql/blob/main/screenshot/ss_permintaan%20produksi.PNG?raw=true)

## Data permintaan produksi_ status waiting

![App Screenshot](https://github.com/EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql/blob/main/screenshot/ss_waiting%20daftar%20permintaan%20produksi.PNG?raw=true)

## Dashboard produksi

![App Screenshot](https://github.com/EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql/blob/main/screenshot/ss_dashboard%20produksi.PNG?raw=true)

## Data permintaan produksi_ to confirm status

![App Screenshot](https://github.com/EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql/blob/main/screenshot/ss_confirm%20daftar%20data%20permintaan%20produksi.PNG?raw=true)

## Create data produk masuk

![App Screenshot](https://github.com/EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql/blob/main/screenshot/ss_input%20produk%20masuk.PNG?raw=true)

## Data produk masuk

![App Screenshot](https://github.com/EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql/blob/main/screenshot/ss_daftar%20data%20produk%20masuk.PNG?raw=true)


## Data permintaan produksi_ confirmed

![App Screenshot](https://github.com/EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql/blob/main/screenshot/ss_confimed%20daftar%20permintaan%20produksi.PNG?raw=true)


## Validasi produk

![App Screenshot](https://github.com/EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql/blob/main/screenshot/ss_validasi%20produk.PNG?raw=true)

## Dashboard warehouse finished good(fg)

![App Screenshot](https://github.com/EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql/blob/main/screenshot/ss_dashboard%20warehouse%20finished%20good.PNG?raw=true)

## Data cetak Qr code

![App Screenshot](https://github.com/EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql/blob/main/screenshot/ss_daftar%20cetak%20label%20qr%20code.PNG?raw=true)

## Label Qr code

![App Screenshot](https://github.com/EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql/blob/main/screenshot/ss_label%20qr%20code.PNG?raw=true)

## Data produk keluar

![App Screenshot](https://github.com/EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql/blob/main/screenshot/ss_daftar%20produk%20keluar.PNG?raw=true)

## Report produk keluar

![App Screenshot](https://github.com/EbenEzerManurung/sistem-informasi-permintaan-produk-dengan-label-qr-code_laravel-8-with-mysql/blob/main/screenshot/ss_cetak%20produk%20keluar.PNG?raw=true)














