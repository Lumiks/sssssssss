<?php
  require "config/db.php"; // Вход в БД
  $data = $_POST;
  if( isset($data['do_new']) ) // Определяем, нажата ли кнопка
  {
  	$errors = array(); // Создаём массив, куда будем заносить ошибки
  	if( trim($data['name_new']) == '') // Проверка на пустое название
  	{
  		$errors[] = 'Введите название новости!';
  	}

  	if( trim($data['description']) == '') // Проверка на пустое описание
  	{
  		$errors[] = 'Введите описание новости!';
  	}

  	if( trim($data['img_new']) == '') // Проверка, если изображение не выбрано
  	{
  		$errors[] = 'Выберите изображение к новости!';
  	}

  	if( empty($errors)) // Если ошибок нет, то...
  	{
  		$new = R::dispense('news'); // Открываем таблицу 'news'
  		$new->name_new = $data['name_new']; // Название новости
  		$new->description = $data['description']; // Описание
  		$new->img_new = $data['img_new']; // Картинка
  		R::store($new); // Заносим данные в таблицу
  		header ('Location: index.php');
  	}
  	else // Иначе показываем ошибку
  	{
  		echo '<div class="error";>'.array_shift($errors).'</div>';
  	}
  }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Создание новости</title>
</head>
<body>
  <ul>
       <li><a href="index.php">Главная</a></li>
       <li><a href="update_new.php">Изменить новость</a></li>
   </ul>
	<form action="create_new.php" method="POST"> <!-- Форма создания новости -->
		<h1>Создание новости</h1>
		<div>
			<label>Название новости:</label>
			<input type="text" name="name_new" value="<?php echo @$data['name_new']; ?>"> <!--value= - сохраняем значения после обновления страницы, для удобства -->
		</div>
		<div>
			<label>Описание:</label>
			<input type="text" name="description" value="<?php echo @$data['description']; ?>">
		</div>
		<div>
			<label>Изображение к новости:</label>
			<input type="file" name="img_new">
		</div>
		<div>
			<center><button type="submit" name="do_new">Создать новость</button></center>
		</div>
	</form>
</body>
</html>