<?php 
  function mainRun () {
    shell_exec("move localhost/laravel domains");

    rename("domains/laravel","domains/5-bilet");

    shell_exec("php composer.phar install --working-dir=domains/5-bilet");

    $env = file_get_contents("domains/5-bilet/.env.example");

    file_put_contents("domains/5-bilet/.env", str_replace('DB_DATABASE=laravel', 'DB_DATABASE=loginregister', $env));

    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "CREATE DATABASE loginregister";
    if ($conn->query($sql) === FALSE) {
      echo "Error creating database: " . $conn->error;
    }

    $conn->close();

    shell_exec("php domains/5-bilet/artisan key:generate");

    shell_exec("php domains/5-bilet/artisan migrate");
  }
?>
