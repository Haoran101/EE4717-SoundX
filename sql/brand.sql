DROP TABLE IF EXISTS brand;
CREATE TABLE IF NOT EXISTS brand (
  brand_id int(11) NOT NULL PRIMARY KEY,
  brand_name varchar(20) NOT NULL
);

INSERT INTO brand (brand_id, brand_name) VALUES
(1, 'Razer'),
(2, 'Beats'),
(3, 'Sony'),
(4, 'SteelSeries'),
(5, 'Bose');