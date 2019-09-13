<?php
function accountexit() {
	unset($_SESSION['login']);
	unset($_SESSION['id']);
	unset($_SESSION['logged']);
	session_destroy();
}

accountexit();
?>