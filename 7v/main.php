<?php 
  function mainRun () {
    shell_exec("move localhost/bootstrap domains");

    rename("domains/bootstrap","domains/7-bilet");
  }
?>
