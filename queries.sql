CREATE SCHEMA yeticave
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_general_ci;
USE yeticave;

CREATE TABLE users (
                     id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
                     register_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                     email VARCHAR(255) NOT NULL UNIQUE,
                     username VARCHAR(64) NOT NULL UNIQUE,
                     password VARCHAR(255) NOT NULL,
                     contacts VARCHAR(255) NOT NULL
);

CREATE TABLE categories (
                          id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
                          name VARCHAR(64) NOT NULL UNIQUE,
                          code VARCHAR(64) NOT NULL
);

CREATE TABLE lots (
                    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
                    creation_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    name VARCHAR(255) NOT NULL,
                    description TEXT(1000) NOT NULL,
                    image VARCHAR(255) NOT NULL,
                    start_price DECIMAL NOT NULL,
                    end_date DATETIME NOT NULL,
                    bet_step DECIMAL NOT NULL,
                    author_id INT NOT NULL,
                    winner_id INT NULL DEFAULT NULL,
                    category_id INT NOT NULL,
                    FOREIGN KEY (author_id) REFERENCES users(id),
                    FOREIGN KEY (winner_id) REFERENCES users(id),
                    FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE TABLE bets (
                    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
                    date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    sum DECIMAL NOT NULL,
                    user_id INT NOT NULL,
                    lot_id INT NOT NULL,
                    FOREIGN KEY (user_id) REFERENCES users(id),
                    FOREIGN KEY (lot_id) REFERENCES lots(id)
);


INSERT INTO users (email, username, password, contacts)
VALUES
  ('user1@mail.ru', 'user1', 'password', '89261112233');

INSERT INTO categories (name, code)
VALUES
  ('Доски и лыжи', 'boards'),
  ('Крепления', 'attachment'),
  ('Ботинки', 'boots'),
  ('Одежда', 'clothing'),
  ('Инструменты', 'tools'),
  ('Разное', 'other');

INSERT INTO lots (name, description, image, start_price, end_date, bet_step, author_id, category_id )
VALUES
  (
    '2014 Rossignol District Snowboard',
    'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
    'img/lot-1.jpg',
    10999,
    '2022-10-24 14:20:45',
    1000,
    1,
    1
  ),
  (
    'DC Ply Mens 2016/2017 Snowboard',
    'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
    'img/lot-2.jpg',
    15999,
    '2022-10-20 14:20:45',
    1000,
    1,
    1
  ),
  (
    'Крепления Union Contact Pro 2015 года размер L/XL',
    'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
    'img/lot-3.jpg',
    8000,
    '2022-10-23 14:20:45',
    1000,
    1,
    2
  ),
  (
    'Ботинки для сноуборда DC Mutiny Charcoal',
    'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
    'img/lot-4.jpg',
    10999,
    '2022-10-27 14:20:45',
    1000,
    1,
    3
  ),
  (
    'Куртка для сноуборда DC Mutiny Charcoal',
    'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
    'img/lot-5.jpg',
    7500,
    '2022-10-28 14:20:45',
    1000,
    1,
    4
  ),
  (
    'Маска Oakley Canopy',
    'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
    'img/lot-6.jpg',
    5400,
    '2022-12-31 23:59:00',
    1000,
    1,
    6
  );
