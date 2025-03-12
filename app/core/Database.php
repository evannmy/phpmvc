<?php

class Database {
  private $dbh;
  private $query;

  function __construct() {
    $servername = DB_SERVER;
    $username = DB_USER;
    $password = DB_PASS;
    $database = DB_NAME;

    $dsn = "mysql:host=$servername;dbname=$database";
    
    try {
      $this->dbh = new PDO($dsn, $username, $password);
      $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      die($e->getMessage());
    }
  }

  function dbQuery($query) {
    $this->query = $this->dbh->prepare($query);
  }

  function execute() {
    $this->query->execute();
  }

  function bind($param, $value, $type=null) {
    if (is_null($type)) {
      switch(true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
      }

      $this->query->bindValue($param, $value, $type);
    }
  }

  function resultSet() {
    $this->execute();
    return $this->query->fetchAll(PDO::FETCH_ASSOC);
  }

  function resultOne() {
    $this->execute();
    return $this->query->fetch(PDO::FETCH_ASSOC);
  }

  function rowCount() {
    return $this->query->rowCount();
  }
}