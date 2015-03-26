CREATE DATABASE report;

GRANT ALL PRIVILEGES ON report.* TO 'web_user'@'localhost' IDENTIFIED BY 'xurumelas';

FLUSH PRIVILEGES;

USE report;

CREATE TABLE line
(
  id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
  payment_type VARCHAR(50),
  amount DOUBLE(10,2)
);
/* exemplos
INSERT INTO <tabela> (<coluna1>,<coluna2>[,<...>]) VALUES (<valor1>,<valor2>[,<...>]);

SELECT <coluna1>, <coluna2> as <apelido>[, <...>]
FROM <tabela>
WHERE <condicao> //<coluna> = <valor>

UPDATE <tabela>
SET <coluna1> = <valor1>,
<coluna2> = <valor2>[,<...>]
WHERE <condicao>

DELETE FROM <tabela> WHERE <condicao>

<condicao>
id = 1 AND name = 'josefina'
id = 1 OR name = 'josefina'
aniversario BETWEEN <data1> AND <data2>
...
*/