create table cats_table (
cat_id INT(5) NOT NULL,
cat_name VARCHAR(30) NOT NULL,
cat_size INT(10) NOT NULL,
cat_color VARCHAR(10) NOT NULL,
cat_location VARCHAR(15) NOT NULL,
cat_category VARCHAR(15) NOT NULL,
cat_extinct INT(15) NOT NULL,
cat_life INT(5) NOT NULL,
cat_cuddle INT(5) NOT NULL,
PRIMARY KEY(cat_id)
);
insert into cats_table(
cat_id, 
cat_name, 
cat_size, 
cat_color, 
cat_location, 
cat_category, 
cat_extinct, 
cat_life, 
cat_cuddle) 
values
(2077, 'Smilodon', 685, 'Tan', 'North America', 'Extinct', 1000, 30, 0),
(2319, 'Xenosmilus', 695, 'Tan', 'North America', 'Extinct', 300000, 11, 1),
(2401, 'Barbary Lion', 465, 'Yellow', 'Africa', 'Extinct', 61, 15, 2),
(2525, 'Caspian Tiger', 530, 'Orange', 'Asia', 'Extinct', 49, 13, 1),
(3000, 'Siamese', 12, 'White', 'Asia', 'Domestic', 0, 17, 3),
(1313, 'Persian', 10, 'White', 'Asia', 'Dosmetic', 0, 14, 4),
(1099, 'Savannah', 14, 'Tan', 'Africa', 'Domestic', 0, 16, 3),
(1492, 'Abyssinian', 9, 'Brown', 'Africa', 'Domestic', 0, 14, 3),
(1690, 'Ocelot', 31, 'Yellow', 'South America', 'Wild', 0, 12, 3),
(1865, 'Jaguar', 165, 'Yellow', 'South America', 'Wild', 0, 14, 2),
(3141, 'Lynx', 53, 'Brown', 'Europe', 'Wild', 0, 20, 2),
(8008, 'Cheetah', 103, 'Yellow', 'Africa', 'Wild', 0, 11, 1);
