<? 
  include 'config.php';
  
  session_start();
  $login = $_POST['login'];
  $sum = $_POST['sum'];
 
  if($login && $sum) {
    $query = mysql_query("SELECT * FROM `accounts` WHERE `Name` = '$login'"); 
    $data = mysql_fetch_assoc($query);
    if($data[pID] > 0) {  
      $public_key = "86d4e-555"; 
      echo "<script language='JavaScript' type='text/javascript'>location='https://api.gdonate.ru/pay?public_key=".$public_key."&sum=".$sum."&account=".$login."&desc=Покупка игровой валюты на нашем сервере!'</script>";
    } else $_SESSION['nodon'] = '<div id="notifier-box" style="position:fixed; bottom:4px; right:10px;"><div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert">&times;</button>Пользователь с данным ником не найден!</div></div>';
}
?>
<div class="donate">
<div class="header"></div> 

<div id="donate" class="box">
	<div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>ПОПОЛНЕНИЕ СЧЕТА</h1>
          </div>
        </div>
		<div class="row">
			<div class="col-md-6 col-sm-8 col-xs-12 col-md-offset-3 col-sm-offset-2 col-xs-offset-0">
				<div class="form-wrp">
					<?=$_SESSION['nodon']; unset($_SESSION['nodon']); ?> <?=$errorsc?>
					<form action="" method="POST">
						<div class="input-wrp">
							<input type="text" name="login" id="login" placeholder="Введите никнейм" required>					
						</div>
						<div class="input-wrp">	
							<input type="text" name="sum" placeholder="Сумма платежа" required>
							<input type="hidden" name="desc" value="Покупка внутриигровой валюты">
						</div>
						<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Оплатить</button><br>
						<a href="#donate_modal" class="donate-buy text-center" data-toggle="modal">Что можно купить?</a>
					</form>
				</div>
			</div>
		</div>	
	</div>
</div>

<div id="donate_modal" class="modal fade">
	<div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h4 class="modal-title text-center">Что можно купить?</h4>
			</div>
			<div class="modal-body">
				<ul class="donate-list">
					<li class="clearfix">Игровая валюта (500$)<span>1 руб</span></li>
					<li class="clearfix">Сменить ник<span>20 руб</span></li>
					<li class="clearfix">Снятие одного варна<span>80 руб</span></li>
					<li class="clearfix">Снятие наркозависимости<span>90 руб</span></li>
					<li class="clearfix">VIP на месяц от<span>75 руб</span></li>
					<li class="clearfix">VIP навсегда от<span>250 руб</span></li>
					<li class="clearfix">Все навыки стрельбы<span>500 руб</span></li>
					<li class="clearfix">Законопослушность (+1)<span>3 руб</span></li>
					<li class="clearfix">Смена пола<span>19 руб</span></li>
					<li class="clearfix">Смена цвета кожи и национальности<span>50 руб</span></li>
					<li class="clearfix">Все лицензии<span>400 руб</span></li>
					<li class="clearfix">Создать семью<span>400 руб</span></li>
					<li class="clearfix">Рецепт от врача<span>2 руб</span></li>
				</ul>
			</div>
        </div>
    </div>
</div>



