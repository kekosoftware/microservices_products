# Enviroment [Docker](https://www.docker.com) by Microservices

## Include:
* [Git](https://git-scm.com/) - Version: 20.10.21
* [Docker Compose](https://docs.docker.com/engine/reference/commandline/compose/) - Version: 20.10.21
* [Composer](https://getcomposer.org/) - Version: 2.4.4
* [PHP](https://www.php.net/) - Image: 7.4.23-apache
* [MariaDB](https://mariadb.org/) - Image: 10.4.21-focal  
* [PHP Unit](https://www.phpmyadmin.net/) - Version: 9.5
* [curl](https://www.php.net/manual/es/book.curl.php) - [apt-get install php-curl] Version: 7.81.0

## Microservices
* Datbase: MariaDb - Private Network: 192.168.20.10
* Product Discount Calculation: Private Network: 192.168.20.20
* Product List: Private Network: 192.168.20.30

* Product List: Public Network: 192.168.10.10

## Environment Installation

From console:
```zsh
git clone https://github.com/kekosoftware/microservices_products.git
composer install
docker compose up -d
```
You can check the service are running: [http://192.168.10.10](http://192.168.10.10)

## Commands availables

```zsh
docker start  Container ID  # Initiating the container
docker stop  Container ID   # Initiating the container
docker compose down  # Stop the enviromment.
```

## Database

You can use the file located in docker/db/tables.sql for initialize the database.

Credentials for the connection:
```zsh
User:     userDB
Password: pwdDB

User root: rootDB
Password:  pwdDB

Database:  mytheresa
```

## How to

* Endpoint - List all products: http://192.168.10.10/
* Endpoint - List product with filter by category: http://192.168.10.10/?category=boots
* Endpoint - List product with filter by category and priceLessThan: http://192.168.10.10/?category=boots&priceLessThan=80000
* Endpoint - List product with filter by priceLessThan: http://192.168.10.10/?priceLessThan=80000


## Test with PHPUNIT
```zsh
vendor/bin/phpunit www/list/test/ProductTest.php --color --testdox
vendor/bin/phpunit www/discount/test/DiscountTest.php --color --testdox
```