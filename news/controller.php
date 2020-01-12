<?php

require "view.php"; // Файл для вывода

  $id = 1;
  while($id != 16) // Цикл вывода до 16 новостей на странице
  {
    $new = R::findOne('news', 'id = '.$id); // Находим данные новостей в БД
    if($new->name_new != NULL) // Если новость есть в БД (название не пустое), то выполняем цикл
    {
    $objView = new View('<img width="300" height="300" src="img/'.$new->img_new.'">', $new->name_new, $new->description); // Вход в класс, для вывода данных
    echo '<p>'.$objView->getImage().'</p>'; // Вывод картинки
    echo '<p>'.$objView->getName().'</p>'; // Выведет название новости
    echo '<p>'.$objView->getDescription().'</p>'; // Выведет описание
    }
    $id++;
  }
?>