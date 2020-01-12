<?php
class View
{
  private $name; // название новости
  private $description; // описание новости
  private $image; // изображение новости
  
  public function __construct($image, $name, $description) // Основная функция класса
  {
    $this->image = $image;
    $this->name = $name;
    $this->description = $description;
  }
 
  public function getName() // Функция для получения имени
  {
    return $this->name; 
  }
 
  public function getDescription() // Функция для получения описания
  {
    return $this->description; 
  }
 
  public function getImage() // Функция для получения картинки
  {
    return $this->image;
  }
}
?>