<?if($_SESSION['logged']=='try'):?>	 
	<div class="cabinet"> 
	<div class="header"></div> 
		<div class="inner">
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-sm-3 col-xs-12 col-md-offset-3 col-sm-offset-2 col-xs-offset-0 text-center">
						<div class="av-wrp">
							<div class="avatar"><img src="application/public/images/skins/<?=user(skin)?>.png" alt=""></div>
						</div>
						<a href="exit"  class="out">Выйти</a>
						<a href="spass"  class="out">Cменить пароль</a>
					</div>
					<div class="col-md-4 col-sm-5 col-xs-12">
						<div class="inf">
							<div class="headline">
								<div class="name"><?=user(login)?></div>
								<div class="lvl">Уровень: <span><?=user(lvl)?></span>&nbsp &nbsp &nbsp &nbsp &nbspРеспектов:<span><?=user(exp)?></span></div>
							</div>
							<ul>
								<li class="clearfix">Наличные:<span><?=user(money)?>$</span></li>
								<li class="clearfix">Банк:<span><?=user(bank)?>$</span></li>
								<li class="clearfix">Телефон:<span><?=user(phone)?></span></li>
								<li class="clearfix">Донат:<span><?=user(donate)?></span></li>
								<li class="clearfix">Пол:<span><?=user(sex)?></span></li>
								<li class="clearfix">IP:<span><?=user(ip)?></span></li>
								<li class="clearfix">Почта:<span><?=user(email)?></span></li>
								<li class="clearfix">Лицензии:<span><?=user(lic)?></span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>							
<?else:?>
<meta http-equiv="refresh" content="0; url=/login">
<?endif?>