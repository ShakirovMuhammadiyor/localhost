<?php 
  function mainRun () {
    shell_exec("move localhost/bootstrap domains");

    rename("domains/bootstrap","domains/8-bilet");
  }
?>
