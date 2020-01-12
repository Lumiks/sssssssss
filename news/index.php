<?php
require "config/db.php";
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Новости</title>
  </head>
  <body>
   <ul>
       <li><a href="create_new.php">Создать новость</a></li>
       <li><a href="update_new.php">Изменить новость</a></li>
   </ul>
   <?php 
	require "controller.php";
   ?>  
  </body>
</html>  