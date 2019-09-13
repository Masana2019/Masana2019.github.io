<?php
class Template {
	function views($action) {
		global $rows, $db;
		if ($action == '' or $action == 'header' or $action == 'footer') {
			if(is_readable(APPLICATION_DIR . 'views/main.php')) {
				require_once(APPLICATION_DIR . 'views/main.php');
			} else {
				exit('Ошибка: Не удалось загрузить шаблон контролера main!');
			}
		}
		elseif ($action != '') {
			if(is_readable(APPLICATION_DIR . 'views/' . $action . '.php')) {
				require_once(APPLICATION_DIR . 'views/' . $action . '.php');
			} else {
				exit('Ошибка: Не удалось загрузить шаблон контролера '. $action .'!');
			}
		}
	}
	function header() {
		global $config;
		if(is_readable(APPLICATION_DIR . 'views/common/header.php')) {
			require_once(APPLICATION_DIR . 'views/common/header.php');
		} else {
			exit('Ошибка: Не удалось загрузить шаблон header!');
		}
	}
	function navmenu() {
		global $config;
		if(is_readable(APPLICATION_DIR . 'views/navmenu.php')) {
			require_once(APPLICATION_DIR . 'views/navmenu.php');
		} else {
			exit('Ошибка: Не удалось загрузить шаблон navmenu!');
		}
	}
	function footer() {
		if(is_readable(APPLICATION_DIR . 'views/common/footer.php')) {
			require_once(APPLICATION_DIR . 'views/common/footer.php');
		} else {
			exit('Ошибка: Не удалось загрузить шаблон footer!');
		}
	}
}
?>