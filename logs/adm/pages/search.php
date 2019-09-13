<?

session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/system/Config.php");
require_once($_SERVER['DOCUMENT_ROOT']."/system/System.php");


if((isset($_POST['is'])) && ($_POST['is'] == "search_user") && (isset($_SESSION['logined'])) && (!empty(trim($_POST['login']))) && ($ap->search_user(trim($_POST['login'])) === true)){
    $_SESSION['search_user'] = trim($_POST['login']);
    echo("/panel");   
}

$content = '

        <div class="bear_2">
            <input placeholder="Login" type="text">
            <div class="button">Поиск</div>
        </div>

';

?>