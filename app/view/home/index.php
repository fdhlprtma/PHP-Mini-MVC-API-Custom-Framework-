<?php
class HomeController
{
  public function index()
  {
    // gunakan view, atau buat logic di sini
    $view = __DIR__ . '/../../view/home/index.php';
    if (file_exists($view)) {
      include $view;
    } else {
      echo "<h1>Home controller: view not found</h1>";
    }
  }
}
?>
