
************
Installation
************
1. clone git
2. Install Xampp
3. buat database baru dengan nama urlqu
4. import database dari urlqu.sql
5. Install composer
6. Masuk ke direktori, lalu update composer

************
Menggunakan API
************

1. Install Postman. Data/parameter yang dikirimkan berupa RAW/JSON
2. Semua method yang digunakan adalah POST

Untuk mendapatkan passhash
http://localhost/shortener/api/getpasshash
{
	"username":"admin",
	"password":"admin"
}

1. Get Data
http://localhost/shortener/api/get
{
	"username":"admin",
	"passhash":"gB0NV05e"
}

2. Insert Data
http://localhost/shortener/api/add
{
	"username":"admin",
	"passhash":"gB0NV05e",
    "title":"judul",
    "url":"https://www.facebook.com/"
}

3. Update Data
http://localhost/shortener/api/set
{
	"username":"admin",
	"passhash":"gB0NV05e",
    "title":"Ganti jadi Udemy",
    "url":"https://www.udemy.com/",
	"link_id":"15"
}

4. Delete Data
http://localhost/shortener/api/delete
{
	"username":"admin",
	"passhash":"gB0NV05e",
	"link_id":"15"
}

