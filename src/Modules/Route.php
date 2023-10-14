<?php 
namespace Core\Modules;
class Route{
  private array $router;
  public function __construct() {
    $this->router = [];
  }
  public function addRouter($path,$handler) {
    $this->router[$path] = $handler;
  }

  public function getRouter($path) {
      if (!empty($this->router[$path])) {
          return $this->router[$path];
      }else {
          header("location:index.php?url=404");
      }
  }
  public static function undefindRouter () {
      include './Blade/blade.Config.php';
      echo $blade->run('undefindRoute',[]);
  }
}