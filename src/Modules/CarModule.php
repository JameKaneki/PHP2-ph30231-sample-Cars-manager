<?php
namespace Core\Modules;
use Core\Modules\Connect;
class CarModule {
  private int $id;
  private string $name;
  private int $price;

  public function __construct() {
    // $this->name = $name;
    // $this->price = $price;
  }
  public function pushCar($name,$price) {
      $connect = new Connect();
      $sql = "INSERT INTO `Cars`(`name`, `price`) VALUES ('$name','$price')";
      $result =  $connect->executeQuery($sql);
      return $result;
  }
  public function getAllCar(){
    $connect = new Connect();
    $sql = "SELECT * FROM `Cars`";
    $result = $connect->fetchMany($sql);
    return $result;
  }
  public function updateCar($id,$name,$price) {
    $connect = new Connect();
    $sql = "UPDATE `Cars` SET `name`='$name',`price`='$price' WHERE `id` = '$id'";
    $connect->executeQuery($sql);
  }
  public function deleteCar($id) {
    $connect = new Connect();
    $sql = "DELETE FROM `Cars` WHERE `id` = '$id'";
    return $connect->executeQuery($sql);
  }
  public  function  getCarById ($id) {
      $connect = new Connect();
      $sql = "SELECT * FROM `Cars` where `id` = $id";
      return $connect->fetchOne($sql);
  }
}