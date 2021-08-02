## Api Register

This is a test application that includes the registration and reception of all users.

### Installation

- clone the repository

```bash
git clone git@github.com:k0ket/register-test.git
```

- switch to the project folder

```bash
cd register-test
```

- setup development domain

```bash
echo "127.0.0.1    register-test.local.com" | sudo tee -a /etc/hosts
```

- apache virtualhost config

```bash
sudo cp .config/apache2/register-test.local.com.conf /etc/apache2/sites-available/register-test.local.com.conf
sudo a2ensite register-test.local.com.conf
sudo service apache2 reload
```

- install dependencies

``` bash
composer install
```

- setup environment configuration

```bash
cp .env.example .env
```

- run this code for create the symbolic link

```bash
php artisan storage:link
```

- setup database

```bash
php artisan migrate
```

- configure permissions

```bash
chmod 777 -R storage bootstrap/cache
```

- run tests

```bash
./vendor/bin/phpunit
```




