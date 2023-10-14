<?php 
namespace Core\Modules;
use PDO,PDOException;
class Connect{

  private $connection;
  public function __construct() {
    try {
      $host = $_ENV['HOSTNAME'];
      $dbname = $_ENV['DATABASENAME'];
      $userName = $_ENV['NAME'];
      $password = $_ENV['PASSWORD'];
      $this->connection = new PDO("mysql:host=$host;dbname=$dbname",$userName,$password);
      // return $this->connection;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }
  public function executeQuery($sql) {
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
  }

  public function fetchOne($sql) {
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  public function fetchMany($sql) {
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }


}


?>