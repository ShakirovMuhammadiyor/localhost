<?php 
  function mainRun () {
    shell_exec("move localhost/laravel domains");

    rename("domains/laravel","domains/12-bilet");

    shell_exec("php composer.phar install --working-dir=domains/12-bilet");

    $env = file_get_contents("domains/12-bilet/.env.example");

    file_put_contents("domains/12-bilet/.env", str_replace('DB_DATABASE=laravel', 'DB_DATABASE=shop', $env));

    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "CREATE DATABASE shop";
    if ($conn->query($sql) === FALSE) {
      echo "Error creating database: " . $conn->error;
    }

    $conn->close();

    shell_exec("php domains/12-bilet/artisan key:generate");

    shell_exec("php domains/12-bilet/artisan migrate");
  }
?>
