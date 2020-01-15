CREATE TABLE users
(
    username VARCHAR(100) NOT NULL PRIMARY KEY,
    password VARCHAR(100) NOT NULL ,
    user_name VARCHAR(100) NOT NULL,
    user_type INT NOT NULL DEFAULT 0,
    user_date VARCHAR(100) NOT NULL
);

CREATE TABLE types
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(100) NOT NULL ,
    type_date VARCHAR(100) NOT NULL
);

CREATE TABLE items
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(100) NOT NULL,
    item_quantity INT NOT NULL DEFAULT 0,
    item_price DOUBLE NOT NULL DEFAULT 0,
    item_date VARCHAR(100) NOT NULL,
    item_type INT NOT NULL,
    item_user VARCHAR(100) NOT NULL
);

CREATE TABLE bills
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    bill_price DOUBLE NOT NULL,
    bill_type INT NOT NULL,
    bill_date VARCHAR(100) NOT NULL
);

CREATE TABLE items_bills
(
    item_id INT NOT NULL,
    bill_id INT NOT NULL,
    quantity INT NOT NULL,
    price DOUBLE NOT NULL,
    PRIMARY KEY( item_id , bill_id )
);

insert into users
values( "m7mad" , "111" , "محمد جابر" , "1" );