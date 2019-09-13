<?

session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/system/Config.php");
require_once($_SERVER['DOCUMENT_ROOT']."/system/System.php");

if((isset($_POST['is'])) && ($_POST['is'] == "logined") && (!empty(trim($_POST['login']))) && (!empty(trim($_POST['password']))) && ($ap->logined(trim($_POST['login']), trim($_POST['password'])) === true)){
    $_SESSION['logined'] = trim($_POST['login']);
    echo("/search");   
}

$content = '

        <div class="bear_1">
            <div class="top"></div>
            <br>
            <i class="ti-unlock"></i>
            <br>
            <input placeholder="Login" class="top" type="text">
            <input placeholder="Password" type="password">
            <br>
            <div class="button">Войти</div>
        </div>

';

?>