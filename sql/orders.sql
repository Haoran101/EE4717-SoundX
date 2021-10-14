DROP TABLE IF EXISTS orders;
CREATE TABLE IF NOT EXISTS orders(
   order_id                INT  NOT NULL PRIMARY KEY
  ,create_time             DATETIME default CURRENT_TIMESTAMP
  ,user_id                 INT  NOT NULL
  ,status                  INT 
  ,delivery_address_line_1 VARCHAR(100)
  ,delivery_address_line_2 VARCHAR(100)
  ,zip_code                VARCHAR(10)
  ,receiver_name           VARCHAR(50)
  ,receiver_contact        VARCHAR(10)
  ,payment_method          VARCHAR(10)
  ,track_number            VARCHAR(10)
);

INSERT INTO orders (order_id, create_time, user_id, status, delivery_address_line_1, delivery_address_line_2, zip_code, receiver_name, receiver_contact, payment_method) VALUES
(24053638, '2021-10-01 15:49:06', 1, 1, '156 Nanyang Cres', '', '636866', 'Haoran Wei', '88888888', 'visa');