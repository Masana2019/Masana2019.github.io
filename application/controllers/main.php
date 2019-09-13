<?php
function login() {
	global $rows, $db;
	if($_POST['button'] == 'singin')
	{
		if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
		if (isset($_POST['password'])) { $password = $_POST['password']; if ($password == '') { unset($password);} }

		if (empty($login) or empty($password))
		{
			echo '<div id="mess" style="position:fixed; bottom:4px; right:10px; ">
			<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Ошибка!</strong> Логин или пароль введены неверно.
			</div></div>';
		}
		$login = stripslashes($login);
		$login = htmlspecialchars($login);

		$password = stripslashes($password);
		$password = htmlspecialchars($password);

		$login = trim($login);
		$password = trim($password);

		$login = $db->real_escape_string($login);
		$password = $db->real_escape_string($password);
		
		$sql = "SELECT * FROM ".$rows['table']." WHERE ".$rows['login']." = '{$login}' LIMIT 1";
		$result = $db->query($sql);

		if($result->num_rows == 1){
			$singin_row = $result->fetch_assoc();
			if ($singin_row[$rows['password']]) 
			{
				$_SESSION['login']     = $singin_row[$rows['login']]; 
				$_SESSION['id']        = $singin_row[$rows['id']];
				$_SESSION['logged']    = 'try';
				echo '<meta http-equiv="refresh" content="1; url=/account">';
				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Выполнено!</strong> Вы успешно авторизировались.
				</div>';
			}
			else 
			{
				echo '<div id="mess" style="position:fixed; bottom:4px; right:10px; ">
				<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Ошибка!</strong> Логин или пароль введены неверно.
				</div></div>';
			}
		}
		else {
			echo '<div id="mess" style="position:fixed; bottom:4px; right:10px; ">
			<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Ошибка!</strong> Логин или пароль введены неверно.
			</div></div>';
		}
	}
} 

if(!empty($_POST['button'])):
	login();
else:
	login();
endif;
?>