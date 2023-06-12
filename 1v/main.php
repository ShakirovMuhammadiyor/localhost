<?php 
  function mainRun () {
    shell_exec("move localhost/laravel domains");

    rename("domains/laravel","domains/1-bilet");

    shell_exec("php composer.phar install --working-dir=domains/1-bilet");

    $env = file_get_contents("domains/1-bilet/.env.example");

    file_put_contents("domains/1-bilet/.env", str_replace('DB_DATABASE=laravel', 'DB_DATABASE=laravel', $env));

    shell_exec("php domains/1-bilet/artisan key:generate");
  }
?>
