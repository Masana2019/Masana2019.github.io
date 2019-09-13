<?php
class Controller {
	function action($action) {
		global $db;
		if ($action == '' or $action == 'header'  or $action == 'maps' or $action == 'edit_pass' or $action == 'edit_mail') { 
			if(is_readable(APPLICATION_DIR . 'controllers/main.php')) {
				require_once(APPLICATION_DIR . 'controllers/main.php');
			} else {
				exit('Ошибка: Не удалось загрузить контролер main!');
			}
		}
		elseif ($action != '') {
			if(is_readable(APPLICATION_DIR . 'controllers/' . $action . '.php')) {
				require_once(APPLICATION_DIR . 'controllers/' . $action . '.php');
			} else {
				exit('Ошибка: Не удалось загрузить контролер '. $action .'!');
			}
		}
	}
}
?>