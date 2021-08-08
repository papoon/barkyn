<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddTablesBarkyn extends AbstractMigration
{
    //migrated 0.1012s
    public function up(): void
    {
        $this->execute("create table customer(
            id INT NOT NULL AUTO_INCREMENT,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(50) NOT NULL,
            birthdate DATE NOT NULL,
            gender ENUM('male','female') NOT NULL,
            PRIMARY KEY ( id )
         );");

        $this->execute("create table subscription(
            id INT NOT NULL AUTO_INCREMENT,
            baseprice decimal(6,2) NOT NULL,
            totalprice decimal(6,2) NOT NULL,
            startdate DATE NOT NULL,
            enddate DATE,
            nextorderdate DATE NOT NULL,
            idcustomer INT NOT NULL,
            PRIMARY KEY ( id ),
            FOREIGN KEY (idcustomer) REFERENCES customer(id)
         );");

        $this->execute("create table petlifestage(
            id INT NOT NULL AUTO_INCREMENT,
            stage VARCHAR(50) NOT NULL,
            PRIMARY KEY ( id )
         );");

        $this->execute("create table pet(
            id INT NOT NULL AUTO_INCREMENT,
            name decimal(6,2) NOT NULL,
            gender ENUM('male','female') NOT NULL,
            weight DATE,
            idlifestage INT NOT NULL,
            PRIMARY KEY ( id ),
            FOREIGN KEY (idlifestage) REFERENCES petlifestage(id)
         );
         ");

        $this->execute("create table subscriptionpet(
            idsubscription INT NOT NULL,
            idpet INT NOT NULL,
            FOREIGN KEY (idsubscription) REFERENCES subscription(id),
            FOREIGN KEY (idpet) REFERENCES pet(id)
         );");


        $this->execute("create table product(
            id INT NOT NULL AUTO_INCREMENT,
            name VARCHAR(100) NOT NULL,
            code VARCHAR(50) NOT NULL,
            price decimal(6,2),
            PRIMARY KEY ( id )
         );");

        $this->execute("create table subscriptionproduct(
            idsubscription INT NOT NULL,
            idproduct INT NOT NULL,
            quantidade INT NOT NULL,
            FOREIGN KEY (idsubscription) REFERENCES subscription(id),
            FOREIGN KEY (idproduct) REFERENCES product(id)
         );");
    }

    public function down(): void
    {
        $this->execute("
        DROP TABLE subscriptionproduct;
        DROP TABLE subscriptionpet;
        DROP TABLE subscription;
        DROP TABLE customer;
        DROP TABLE pet;
        DROP TABLE petlifestage;
        DROP TABLE product;"
        );
    }
}
