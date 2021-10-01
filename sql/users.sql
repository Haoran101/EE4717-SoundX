DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users(
   user_id    INT  NOT NULL PRIMARY KEY AUTO_INCREMENT
  ,email      VARCHAR(50) NOT NULL
  ,password   VARCHAR(50) NOT NULL
  ,first_name VARCHAR(50) NOT NULL
  ,last_name  VARCHAR(50) NOT NULL
  ,contact    VARCHAR(10) NOT NULL
);

INSERT INTO users (user_id, email, password, first_name, last_name, contact) VALUES (1, 'haoranwei@test.com', 'haoranwei@test.com', 'haoran', 'wei', '88888888');
INSERT INTO users (user_id, email, password, first_name, last_name, contact) VALUES (2, 'sining040@gmail.com', 'sining040@gmail.com', 'sining', 'lin', '88888888');
