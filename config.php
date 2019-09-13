<?php
date_default_timezone_set ('Europe/Moscow'); // часовой пояс
define("DB_HOST","localhost"); // хост базы данных
define("DB_USER","root"); // пользователь базы данных
define("DB_PASS",""); // пароль от базы данных
define("DB_BASE","www"); // имя базы данных
@mysql_connect(DB_HOST,DB_USER,DB_PASS)
or die("Ошибка подключения к базе данных. Если вы администратор - настройте правильно базу данных в конфиге.");
@mysql_select_db(DB_BASE)
or die("Ошибка mysql_select_db()");
?>
