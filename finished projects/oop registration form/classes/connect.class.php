<?php

class Connect
{
    private $username = "root";
    private $password = "";
    private $dbName = 'logindb';
    private $host = "localhost";

    protected function connectDB()
    {
        $dataSourceName = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dataSourceName, $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_BOTH);
        return $pdo;
    }
}
