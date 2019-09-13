<?php
	function restore() {
	global $rows, $db;
	
	$sql = "SELECT * FROM ".$rows['table']." WHERE `".$rows['email']."` = '".$_POST['email']."' LIMIT 1";
	$result = $db->query($sql);
	$email = $result->fetch_assoc();
	
	if($_POST['email'] == $email[$rows['email']] && !empty($_POST['email'])):
		$npassword = rand($rows['min'], $rows['max']);		
		$topic = "Восстановление пароля на сервере ".$config['name'].".";
		$message = "Вы запросили восстановление пароля на сервере.
		<br>На ваш аккаунт было запущено восстановление пароля. Если это сделали не вы, а злоумышленники то измените пароль в кратчайшие строки.
		<br><br>
		Новые данные для входа
		<ul>
		<li>Ваш новый пароль: ".$npassword."</li>
		<li>Ваш ID: ".$id_p."</li>
		</ul>
		<br><br>
		С уважением, администрация сервера ".$config['name']."";
		$headers = "From: ".$config['mail']."\r\nReply-To: ".$config['mail']."\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=utf-8;";
		$mbody .= $message."\r\n\r\n";
		mail($rows['email'], $topic, $message, $mbody, $headers);
		
		$sql = "UPDATE `accounts` SET `password` = `{$npassword}` WHERE `email` = `{$_POST['email']}`";
        $result = $db->query($sql);

		echo '<div id="notifier-box" style="position:fixed; bottom:4px; right:10px;"><div class="alert alert-success fade in"><button type="button" class="close" data-dismiss="alert">&times;</button>Новый пароль был отправлен на Email адресс.</div></div>';	
	else:
		if($_POST['restore'] == 'ok'):
			echo '<div id="notifier-box" style="position:fixed; bottom:4px; right:10px;"><div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert">&times;</button>Введенный вами Email адрес не подходит к данному аккаунту.</div></div>';
		endif;
	endif;
}

if(!empty($_POST['restore'])):
	restore();
else:
	restore();
endif;
?>