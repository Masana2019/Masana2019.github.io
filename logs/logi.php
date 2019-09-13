<html>
	<head>
		<title>Логгирование</title>
	<body background="http://365psd.ru/images/backgrounds/bg-light-4860.png"></body>
	<h1 style="text-align: center;"><font color="1168a6"><font size="6"><font face="Tahoma, Geneva, sans-serif">Fenix Project - Логгирование</font></font></font></h1>
	<form name="search" method="post" >
	<p style="text-align: center;"><input maxlength="50" name="query" size="50" type="search" placeholder="Введите ID, Ник, или любой текст" /></p>
	<p style="text-align: center;"><button type="submit">Найти/обновить</button></p>
    </form>

</html>
<?php
$con_str=mysql_connect('localhost', 'root', '', 'www');
if(mysql_connect('localhost','root')){
echo "Нет подключения к базе данных.";
}
$query=$_POST['query'];
mysql_select_db('db1',$con_str);
mysql_query("SET NAMES utf8");
$result=mysql_query("SELECT * FROM `www`.`logs` WHERE  `string` LIKE  '%$query%' ORDER BY  `datatimes` DESC ,  `string` DESC");
while($row = mysql_fetch_array($result)){
$datatimes=$row['datatimes'];
$string=$row['string'];
echo "<pre><p>&#9;$datatimes - $string</p></pre>";
}
mysql_close();
?>
<html>
<footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>© 2018</b>
            </div>
            <b>|Logs by Jason_Steward</a>.
    </footer>
</html>
