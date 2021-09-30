DROP TABLE IF EXISTS order_items;
CREATE TABLE IF NOT EXISTS order_items(
   order_id   INT  NOT NULL
  ,product_id INT  NOT NULL
  ,qty        INT  NOT NULL
);