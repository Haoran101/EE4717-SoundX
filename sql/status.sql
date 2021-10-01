DROP TABLE IF EXISTS status;
CREATE TABLE IF NOT EXISTS status (
  status_id int(1) NOT NULL PRIMARY KEY,
  status_name varchar(20) NOT NULL
);

INSERT INTO status (status_id, status_name) VALUES
(1, 'paid'),
(2, 'confirmed'),
(3, 'shipped'),
(4, 'received');