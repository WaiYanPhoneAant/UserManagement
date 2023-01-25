<?php

require "./vendor/autoload.php";
use db\connection;



$config=require "./config.php";
$pdo=connection::make($config['database'])->connectPDO();
$password=password_hash('admin',PASSWORD_BCRYPT);
$queries=[
    //create user table
    "DROP TABLE  IF EXISTS users",
    "CREATE TABLE users (
        `id` int NOT NULL AUTO_INCREMENT,
        `name` varchar(100) NOT NULL,
        `email` varchar(255) NOT NULL,
        `role` tinyint DEFAULT '0',
        `password` varchar(255) NOT NULL,
        `address` text,
        `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`) );
    ",
    "DROP TABLE  IF EXISTS role",
    "CREATE TABLE `role` (
        `id` int NOT NULL AUTO_INCREMENT,
        `role_id` int NOT NULL,
        `role_name` varchar(100) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `role_id` (`role_id`)
      );
    ",
    "INSERT INTO role(role_id,role_name) VALUES ('0','user')",
    "INSERT INTO role(role_id,role_name) VALUES ('1','moderator')",
    "INSERT INTO role(role_id,role_name) VALUES ('2','admin')",
    "INSERT INTO users(name,email,role,password) VALUES ('admin','admin@gmail.com','2','$password')"
      
    
];
foreach ($queries as $query) {
    $stm=$pdo->prepare($query);
    $stm->execute();
}
echo "----------------Successfully Migrated---------------------\n";
exit();