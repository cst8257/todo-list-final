DROP DATABASE IF EXISTS todo_list;
CREATE DATABASE todo_list;

USE todo_list;

DROP TABLE IF EXISTS items;
CREATE TABLE items (
	id BIGINT PRIMARY KEY AUTO_INCREMENT,
	task VARCHAR(150) NOT NULL
);

INSERT INTO items (id, task) VALUES
(1, 'Buy Milk'),
(2, 'Feed Cat'),
(3, 'Clean Room');