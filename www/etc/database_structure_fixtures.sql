 /*
        DB structure for SMSCanada
        MySQL
*/

CREATE DATABASE IF NOT EXISTS `smscanada_cake_dev`;

USE `smscanada_cake_dev`;

DROP TABLE IF EXISTS `cake_sessions`;
CREATE TABLE `cake_sessions` (
  `id` varchar(255) NOT NULL DEFAULT '' PRIMARY KEY,
  `data` text,
  `expires` int(11) DEFAULT NULL
);


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `last_login` datetime DEFAULT '0000-00-00 00:00:00',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
);


drop table if exists dealers;
create table dealers (
        
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        /* reference id from users */
        user_id INT,
        /* reference a table of types */
        type_id INT,
        /* organisation name */
        organisation VARCHAR(255),
        
        /* contact person */
        firstname VARCHAR(50),
        lastname VARCHAR(75),
        
        email VARCHAR(125),
        phone VARCHAR(125),
        
        address VARCHAR(125),
        postal VARCHAR(20),
        city VARCHAR(50),
        province VARCHAR(50),
        country VARCHAR(50),
        
        url VARCHAR(255),
        
        created DATETIME,
        modified DATETIME,
        
        active TINYINT(1)
);

drop table if exists types;
create table types(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);
        
drop table if exists products;
create table products (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    
    /* reference to 'categories'  table*/
    category_id INT,
    /* reference to 'manufacturers' table  */
    manufacturer_id INT,
    
    /* reference to 'scissors_categories */
    scissors_category_id INT,
    
    /* Reference to the 'prices' table */
    price_id INT,
    parts_number VARCHAR(25),

    name VARCHAR(175),
    name_french VARCHAR(175),

    description TEXT,
    description_french TEXT,

    detail TEXT,
    detail_french TEXT,

    new TINYINT(1),
    sale TINYINT(1),

    /* created and modified are automagically set by cakePHP */
    created DATETIME,
    modified DATETIME
);

drop table if exists categories;
create table categories (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150),
    description TEXT,
    description_fr TEXT
);



/* Product images */
drop table if exists images;
create table images (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    filename VARCHAR(255),
    caption VARCHAR(255)
);

/**
    ORDERS
**/
/*
    orders_auto stores just the product ID and info is pulled from the DB for valid products
*/
drop table if exists orders_auto;
create table orders_auto (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    /* reference to the 'products' table */
    product_id INT,
    qty INT
    );

/*
    orders_manual stores a particular users manually entered orders.
    items listed here are the kind of items not available through regular
    browsing. 
*/
drop table if exists orders_manual;
create table orders_manual (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    /* items referenced to user_id from users */
    user_id INT,
    /* item number from manual input only as its not found in DB*/
    product_id TEXT,
    /*amount */
    qty INT,
    /* Description of the item up to 100 chars */
    item_name VARCHAR(100)
);

/* 
    Information regarding product manufacturers
*/
drop table if exists manufacturers;
create table manufacturers (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150)
);

/* 
    Machines contains a list of models by each manufacturer.  manf can have many or one model
*/
drop table if exists machines;
create table machines (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    /* this is the manufacturer so this links to id from manufacturers */
    manufacturer_id INT,
    /* this is the model number identifying the machine, such as Singer 123 */
    model_num TEXT
   
);

/*
    Compability list, which machine model is compatible with what product ? 
*/
drop table if exists compabilities;
create table compabilities(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    machine_id INT      
);

/*
    Specials defines the current promotions listed in the promotions area
    This table was standalone but can be incorporated with TYPES as different specials apply to different dealers (rarely but they can now)
*/
drop table if exists specials;
create table specials(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    /* link to the dealer type thru id from users? */
    type_id INT,
    /* active special? yes/no*/
    active TINYINT,
    /* the name/description of the special */
    name TEXT,
    name_fr TEXT,
    /* links to the PDF/excel/doc file */
    url TEXT,
    url_fr TEXT,
    /* start and end dates, do not display promo after end date */
    start DATETIME,
    end DATETIME
);


/*    
    Scissor Categories table for the separation of scissors into types when scissor cataloging 
    */
drop table if exists scissors_categories;
create table scissors_categories(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);

/* 
    Prices is for the import of the excel price list.  this table will need updating from an excel file which can be uploaded from a form (finally... make it easy for everyone else here to update pricing!)
*/
drop table if exists prices;
create table prices(
    /* Prices are set in Canadian Dollars */
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

    /* Two price tags, one for wholesale dealers and */
    wholesale_price FLOAT,
    /* One for house dealers */
    house_price FLOAT
);

/*
    Excel file links to downloadable price lists
*/
drop table if exists excel_files;
create table excel_files(
    wholesale_excel TEXT,
    house_excel TEXT
);
