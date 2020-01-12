<?php

require "view.php"; // Файл для вывода
require "config/db.php"; // Файл БД
$data = $_POST;
$id = 1;
  while($id != 16)
  {
    $new = R::findOne('news', 'id = '.$id); // Находим данные новостей в БД
      if($new->name_new != NULL) // Если новость есть в БД (название не пустое), то выполняем цикл
      {
        if( isset($data['up_'.$id.'']) ) // Определяем, нажата ли кнопка
        {
          $errors = array(); // Создаём массив, куда будем заносить ошибки
          if( trim($data['name_new_'.$id.'']) == '') // Проверка на пустое название
          {
            $errors[] = 'Введите название новости!';
          }

          if( trim($data['desc_'.$id.'']) == '') // Проверка на пустое описание
          {
            $errors[] = 'Введите описание новости!';
          }

          if( empty($errors)) // Если ошибок нет, то...
          {
              R::exec( 'UPDATE news SET name_new="'.$data['name_new_'.$id.''].'", description = "'.$data['desc_'.$id.''].'" WHERE id = '.$id ); // Изменяем данные
          }
          else // Иначе показываем ошибку
          {
            echo '<div class="error";>'.array_shift($errors).'</div>';
          }
        }
    }
    $id++;
  }
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Новости</title>
  </head>
  <body>
     <ul>
         <li><a href="index.php">Главная</a></li>
         <li><a href="create_new.php">Создать новость</a></li>
     </ul>
  </body>
</html>
<form action="update_new.php" method="POST">
<table border="1" cellpadding="1" cellspacing="1">
  <caption>Редактировать</caption>
    <tr>
      <th>Название</th>
      <th>Описание</th>
      <th>Изображение</th>
      <th>Сохранить</th>
    </tr>
    <tr>
<?php
  $id = 1;
  while($id != 16) // Цикл вывода до 16 новостей на странице
  {
    $new = R::findOne('news', 'id = '.$id); // Находим данные новостей в БД
    if($new->name_new != NULL) // Если новость есть в БД (название не пустое), то выполняем цикл
    {
    $objView = new View('<img width="300" height="300" src="img/'.$new->img_new.'">', $new->name_new, $new->description); // Вход в класс, для вывода данных

    echo '<td><input type="text" name="name_new_'.$id.'" value="'.$objView->getName().'"></td>'; // Выведет название новости

    echo '<td><textarea name="desc_'.$id.'" style="margin: 0px; width: 322px; height: 196px;">'.$objView->getDescription().'</textarea></td>'; // Выведет описание

    echo '<td><img src="img/'.$new->img_new.'" width="150"></td>'; // Вывод картинки

     echo '<td><button type="submit" style="height: 20px; width: 80px;" name="up_'.$id.'">Сохранить</button></td></tr>'; // Кнопка сохранить данные
    }
     
    $id++;
  }
  
?>
  </table>
</form>