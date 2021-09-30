DROP TABLE IF EXISTS orders;
CREATE TABLE IF NOT EXISTS orders(
   order_id                INT  NOT NULL PRIMARY KEY AUTO_INCREMENT
  ,create_time             DATETIME 
  ,user_id                 INT  NOT NULL
  ,status                  INT 
  ,delivery_address_line_1 VARCHAR(100)
  ,delivery_address_line_2 VARCHAR(100)
  ,zip_code                VARCHAR(10)
  ,receiver_name           VARCHAR(50)
  ,receiver_contact        VARCHAR(10)
  ,payment_method          INT
);