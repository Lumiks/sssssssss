<?php

require "libs/rb.php"; // Подключаем библиотеку для создания БД
 R::setup( 'mysql:host=127.0.0.1;dbname=news',
        'root', '' ); // Заносим данные