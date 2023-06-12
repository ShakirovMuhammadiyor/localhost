<?php 
  function mainRun () {
    shell_exec("move localhost/laravel domains");

    rename("domains/laravel","domains/4-bilet");

    shell_exec("php composer.phar install --working-dir=domains/4-bilet");

    $env = file_get_contents("domains/4-bilet/.env.example");

    file_put_contents("domains/4-bilet/.env", str_replace('DB_DATABASE=laravel', 'DB_DATABASE=maqolalar', $env));

    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "CREATE DATABASE maqolalar";
    if ($conn->query($sql) === FALSE) {
      echo "Error creating database: " . $conn->error;
    }

    $conn->close();

    shell_exec("php domains/4-bilet/artisan key:generate");

    shell_exec("php domains/4-bilet/artisan migrate");
  }
?>
