<?php 
  namespace Core\Controllers;
  use Core\Modules\CarModule;

  class CarController{
    public static function showCarTable () {
      $carModule = new CarModule();
      $carList = $carModule->getAllCar();
      $data = ['cars' => $carList, 'title' => 'Product table'];
      include 'Blade/blade.Config.php';
      echo $blade->run('productTable', $data);
//
    }
    public static function newCar(){
        $data = [];
        $numberRegex = "/[0-9]/";
        if (isset($_POST['newCar'])) {
            global  $data;
            $name = $_POST['name'];
            $data['name'] = $name;
            $price = $_POST['price'];
            $data['price'] = $price;
            if (empty($name) || empty($price)) {
                global $data;
                $data["error"] = "some field are required";
            }
            if (!is_int(intval($price))) {
                global $data;
                $data["error"] = "Price type must be a number";
            }
            if (empty($data["error"])) {
                $carModule = new CarModule();
                $result = $carModule->pushCar($name,$price);
                header("location:index.php");
                return;
            }
        }
        include 'Blade/blade.Config.php';
        echo $blade->run('newCar',$data);
    }
    public static  function deleteCar () {
        if (!isset($_GET['id'])) {
            header("location:index.php?url=404");
        }else {
            $id = $_GET['id'];
            $carModule = new CarModule();
            $carModule->deleteCar($id);
            header("location:index.php");
        }
    }
    public static  function editCar() {
        $data = [];
        if(!isset($_GET['id']) || $_GET['id'] === '') {
            header("location:index.php?url=404");
        }
        if (isset($_POST['editCar'])) {
            $name = $_POST['name'];
            $data['name'] = $name;
            $price = $_POST['price'];
            $data['price'] = $price;
            $id = $_POST['id'];
            $data['id'] = $id;
            if (empty($name) || empty($price)) {
                global $data;
                $data["error"] = "some field are required";
            }
            if (!is_int(intval($price))) {
                global $data;
                $data["error"] = "Price type must be a number";
            }
            if (empty($data["error"])) {
                $carModule = new CarModule();
                $result = $carModule->updateCar($id,$name,$price);
                header("location:index.php");
                return;
            }
        }
        if ($data === []){
            global $data;
            $id = $_GET['id'];
            $carModule = new CarModule();
            $result = $carModule->getCarById($id);
            if(!$result) {
                header("location:index.php?url=404");
            }
            $data = [...$result];

        }
        include "Blade/blade.Config.php";
        echo $blade->run('editCar',$data);
    }
  }

?>