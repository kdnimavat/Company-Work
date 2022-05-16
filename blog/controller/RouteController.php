<?php
// include '';
class RouteController
{

  public function __construct()
  {
    $action = $_SERVER['QUERY_STRING'];

    if (empty($action)) {
      $action = "create";
    }

    switch ($action) {
      case 'create':
        
        header("Location: ../../home/index.php");
        break;

      default:
        # code...
        break;
    }
  }
}