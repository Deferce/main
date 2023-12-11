<?php

class Connect
{
  private $username = "if0_35502129";
  private $password = "E8lduVERJjc05q4";
  private $dbName = 'if0_35502129_oopregistrationform';
  private $host = "sql313.infinityfree.com";


  protected function connectDB()
  {
    try {
      $dataSourceName = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
      $pdo = new PDO($dataSourceName, $this->username, $this->password);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_BOTH);
      return $pdo;
    } catch (PDOException $e) {
      // Handle connection errors
      die("Connection failed: " . $e->getMessage());
    }
  }
}
