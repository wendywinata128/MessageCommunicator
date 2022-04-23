<?php
include './database.php'
  
$con->query('CREATE TABLE message(
  id INT(6) AUTO_INCREMENT PRIMARY KEY,
  message VARCHAR(MAX),
  key VARCHAR(64),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)')

