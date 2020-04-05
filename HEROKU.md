# Tutorial Deploy Laravel ke Heroku

> Heroku adalah sebuah cloud platform yang menjalankan bahasa pemrograman tertentu, Heroku mendukung bahasa pemrograman seperti Ruby, Node.js, Python, Java, PHP, dan lain-lain.
>
> Heroku termasuk ke dalam kriteria Platform As A Service (PaaS), sehingga bagi anda yang ingin melakukan deploy aplikasi ke heroku cukup hanya dengan melakukan konfigurasi aplikasi yang ingin di deploy dan menyediakan platform yang memungkinkan pelanggan untuk mengembangkan, menjalankan, dan mengelola aplikasi tanpa kompleksitas membangun dan memelihara infrastruktur yang biasanya terkait dengan pengembangan dan peluncuran aplikasi.
>
Sumber: [https://www.codepolitan.com](https://www.codepolitan.com/membuat-proyek-pertama-heroku-58b872c6217eb)

## Ada 2 cara deploy laravel ke heroku

1. Menggunakan Heroku CLI, heroku CLI ini command line tool yang harus di install di komputer kita, Tutorial lengkapnya [DISINI](https://devcenter.heroku.com/articles/getting-started-with-laravel)
2. Push ke github, lalu setting agar auto deploy ketika kita push ke github, serikut langkah nya
    - Create New App [DISINI](https://dashboard.heroku.com/new-app)
    - Pilih App yang telah dibuat
    - Config deploy app:
        - Tab "Deploy", ke Deployment Method lalu klik GitHub (connect to GitHub)
        - Seletah connect, search repo-name mana project laravelnya, klik connect
        - Choose a branch to deploy, pilih master / branch lain
        - Check saja Wait for CI to pass before deploy, karena di GitHub sudah otomatis ada TravisCI sebagai Continuous Integration service 
        - Klik Enable Automatic Deploys
        - Bisa coba commit dan push di repo GitHub
    - Config ENV in Heroku:
        - Kita tidak perlu membuat file .env manual, heroku telah menyediakan settingannya
        - Tab "Setting" > Config Vars > klik Reveal Config Vars
        - KEY berisi APP_KEY
        - VALUE berisi base64:Ci8UWlBqugsy7oq7qFG6PrIyOb4bTDXlX4GeYGbCw08=
        - Semua yang di file .env bisa di terapkan di sini
    - Procfile
        - Buat file Procfile berisi `web: vendor/bin/heroku-php-apache2 public/`, kerena heroku mejalankan file `index.php` di root, makanya perlu di arahkan ke `public/`.
    - Logging
        - Lihat caranya [DISINI](https://devcenter.heroku.com/articles/getting-started-with-laravel#best-practices)
     

### Test trigger deploy
