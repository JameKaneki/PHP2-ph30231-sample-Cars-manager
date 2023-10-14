<?php 
  require __DIR__.'/vendor/autoload.php';
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->load();

  use Core\Controllers\CarController;
  use Core\Modules\Route;
  $router = new Route();
  $router->addRouter('/',[CarController::class,'showCarTable']);
  $router->addRouter('404',[Route::class,'undefindRouter']);
  $router->addRouter('newCar',[CarController::class,'newCar']);
  $router->addRouter('pushCar',[CarController::class,'pushCar']);
  $router->addRouter('editCar',[CarController::class,'editCar']);
  $router->addRouter('deleteCar',[CarController::class,'deleteCar']);
  $handler = null;
  if (empty($_GET['url'])) {
    $handler = $router->getRouter('/');
  } else {
    $url = $_GET['url'];
    $handler = $router->getRouter($url);
  }
  call_user_func($handler);

?>