<?php
	function user($param) {
		global $rows, $db;
		$sql = "SELECT * FROM ".$rows['table']." WHERE ".$rows['id']." = '".$_SESSION['id']."'";
		$result = $db->query($sql);
		$user = $result->fetch_assoc();
		
		if($param == 'sex'):
			if($user[$rows['sex']] == $rows['male']):
				return 'Мужской';
			elseif($user[$rows['sex']] == $rows['female']):
				return 'Женский';
			endif;
		else:
			return $user[$rows[$param]];
		endif;
	}
?>