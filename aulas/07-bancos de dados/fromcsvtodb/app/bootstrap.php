<?php
require __DIR__ . "/../vendor/autoload.php";

use DRC\Interaction\Insert;
date_default_timezone_set('America/Sao_Paulo');

$ini = (object)parse_ini_file('settings/db.ini');
$pdo = new PDO($ini->dsn, $ini->username, $ini->password);

$insert = new Insert();
$insert->run($pdo);


/*
 CREATE TABLE sale
(
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    transaction_date DATETIME,
    price DOUBLE(16,2) DEFAULT 0.00 NOT NULL,
    payment_type VARCHAR(50) NOT NULL,
    name VARCHAR(100) NOT NULL,
    city VARCHAR(100) NOT NULL,
    state CHAR(2) NOT NULL,
    country CHAR(3) NOT NULL,
    account_created DATETIME,
    last_login DATETIME,
    latitude DOUBLE(12,8),
    longitude DOUBLE(12,8)
);

 */