CREATE DATABASE ajax;

USE ajax;

CREATE TABLE fruits (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    price INT NOT NULL,
    quantity VARCHAR(10) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO fruits (name, price, quantity) VALUES ("Apple", 50, "1 Kg");
INSERT INTO fruits (name, price, quantity) VALUES ("Banana", 30, "12 Piece");
INSERT INTO fruits (name, price, quantity) VALUES ("Mango", 40, "1 Kg");
INSERT INTO fruits (name, price, quantity) VALUES ("Orange", 75, "1 Kg");
INSERT INTO fruits (name, price, quantity) VALUES ("Watermelon", 60, "1 Piece");
INSERT INTO fruits (name, price, quantity) VALUES ("Guava", 15, "1 Kg");
INSERT INTO fruits (name, price, quantity) VALUES ("Grapes", 65, "1 Kg");
INSERT INTO fruits (name, price, quantity) VALUES ("Papaya", 30, "1 Piece");
INSERT INTO fruits (name, price, quantity) VALUES ("Apricot", 500, "1 Kg");
INSERT INTO fruits (name, price, quantity) VALUES ("Pomegranate", 120, "1Kg");

CREATE TABLE cities (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    country VARCHAR(20) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO cities (name, country) VALUES ( "Kanpur", "India" );
INSERT INTO cities (name, country) VALUES ( "Lucknow", "India" );
INSERT INTO cities (name, country) VALUES ( "Noida", "India" );
INSERT INTO cities (name, country) VALUES ( "Banglore", "India" );
INSERT INTO cities (name, country) VALUES ( "Karachi", "Pakistan" );
INSERT INTO cities (name, country) VALUES ( "Islamabad", "Pakistan" );
INSERT INTO cities (name, country) VALUES ( "Lahore", "Pakistan" );
INSERT INTO cities (name, country) VALUES ( "Faislabad", "Pakistan" );
INSERT INTO cities (name, country) VALUES ( "Dhaka", "Bangladesh" );
INSERT INTO cities (name, country) VALUES ( "Khulna", "Bangladesh" );
INSERT INTO cities (name, country) VALUES ( "Barisal", "Bangladesh" );
INSERT INTO cities (name, country) VALUES ( "Bogra", "Bangladesh" );
INSERT INTO cities (name, country) VALUES ( "Kathmandu", "Nepal" );
INSERT INTO cities (name, country) VALUES ( "Pokhara", "Nepal" );
INSERT INTO cities (name, country) VALUES ( "Lalitpur", "Nepal" );
INSERT INTO cities (name, country) VALUES ( "Janakpur", "Nepal" );

CREATE TABLE questions (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO questions (title) VALUES ("MBA karkay pakoda kaisay banaye ?");
INSERT INTO questions (title) VALUES ("Loan leykay Nirav Modi kaisay baney ?");
INSERT INTO questions (title) VALUES ("Berozgari ko kaisay chupaye ?");
INSERT INTO questions (title) VALUES ("B.Tech ke baad kya kare ?");
INSERT INTO questions (title) VALUES ("Berozgar kaisay baney ?");
INSERT INTO questions (title) VALUES ("Andh Bhakti kaisay kare ?");
INSERT INTO questions (title) VALUES ("Kam salary mein Raja kaisay baney ?");
INSERT INTO questions (title) VALUES ("Nakli Passport kaha bantay hai ?");
INSERT INTO questions (title) VALUES ("PUBG mein headshot kaisay lagaye ?");
INSERT INTO questions (title) VALUES ("Pirated Movies kaha pe miltay hai ?");
INSERT INTO questions (title) VALUES ("Torrent kaisay download kare ?");
INSERT INTO questions (title) VALUES ("Patanjali ka ghee kaisay test karey ?");
INSERT INTO questions (title) VALUES ("Kanpur kaha pe hai ?");
INSERT INTO questions (title) VALUES ("Dost ki girlfried kaisay pataye ?");
INSERT INTO questions (title) VALUES ("Notebandi ke bad kya hua ?");
INSERT INTO questions (title) VALUES ("Kala dhan Safed dhan kaisay banaye ?");
INSERT INTO questions (title) VALUES ("Khet mein saand ki kaisay bhagaye ?");
INSERT INTO questions (title) VALUES ("ganguly tech ke video kaisay hai ?");
INSERT INTO questions (title) VALUES ("80 Saal purana Fighter Jet kaisay udaye ?");
INSERT INTO questions (title) VALUES ("Roadways bus mein kaisay safar kare ?");
INSERT INTO questions (title) VALUES ("Barish ke pani ki bachat kaisay kare ?");
INSERT INTO questions (title) VALUES ("Modi ke jumlay se kaisay bache ?");

CREATE TABLE profiles (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    password VARCHAR(32) NOT NULL,
    email VARCHAR(50) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO profiles (name, password, email) VALUES("Sandeep", MD5('12345'), 'sandeep@abc.com');
INSERT INTO profiles (name, password, email) VALUES("Amit", MD5('12345'), 'amit@abc.com');
INSERT INTO profiles (name, password, email) VALUES("Deepak", MD5('12345'), 'deepak@abc.com');
INSERT INTO profiles (name, password, email) VALUES("Shubham", MD5('12345'), 'shubham@abc.com');
INSERT INTO profiles (name, password, email) VALUES("Rizwan", MD5('12345'), 'rizwan@abc.com');
INSERT INTO profiles (name, password, email) VALUES("Abdul", MD5('12345'), 'abdulk@abc.com');
INSERT INTO profiles (name, password, email) VALUES("Shweta", MD5('12345'), 'shweta@abc.com');
INSERT INTO profiles (name, password, email) VALUES("Namita", MD5('12345'), 'namita@abc.com');
INSERT INTO profiles (name, password, email) VALUES("Divya", MD5('12345'), 'divya@abc.com');
INSERT INTO profiles (name, password, email) VALUES("Sarla", MD5('12345'), 'sarla@abc.com');
INSERT INTO profiles (name, password, email) VALUES("Archana", MD5('12345'), 'archana@abc.com');