<?

session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/system/Config.php");
require_once($_SERVER['DOCUMENT_ROOT']."/system/System.php");

$user = $ap->select_profile($_SESSION['search_user']);

$money_logs = $ap->select_money_logs($_SESSION['search_user']);

$ban = $ap->select_ban($_SESSION['search_user']);

$money_warning = 0;

for ($i = 0; $i <= (count($money_logs)-1); $i++) {
    $money_logs_content .= '<p>'.$money_logs[$i][$config['DATABASE']['TABLE_LOGS_FIELDS']['FIELD_DATE']].' &nbsp; &nbsp; Игрок <a href="/panel/'.$money_logs[$i][$config['DATABASE']['TABLE_LOGS_FIELDS']['FIELD_NAME']].'">'.$money_logs[$i][$config['DATABASE']['TABLE_LOGS_FIELDS']['FIELD_NAME']].'</a> '.$money_logs[$i][$config['DATABASE']['TABLE_LOGS_FIELDS']['FIELD_TEXT']].' $'.$money_logs[$i][$config['DATABASE']['TABLE_LOGS_FIELDS']['FIELD_MONEY']].' Назначение: '.$money_logs[$i][$config['DATABASE']['TABLE_LOGS_FIELDS']['FIELD_USES']].'</p>';  
    if($money_logs[$i][$config['DATABASE']['TABLE_LOGS_FIELDS']['FIELD_MONEY']] > 100000){
        $money_warning = 1;
    }
}

if($user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_REGIP']] == $user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_LASTIP']]){
    $ip_class_1 = "green";
    $ip_class_2 = "green";
}
else{
    $ip_class_1 = "green";
    $ip_class_2 = "red";
}

if($money_warning == 1){
    $money_class = "red";
    $money_text = "найдены";
}
else{
    $money_class = "green";
    $money_text = "не найдены";
}

$dostup_class_1 = "off";
$dostup_class_2 = "off";
$dostup_class_3 = "off";
$dostup_class_4 = "off";
$dostup_class_5 = "off";
$dostup_class_6 = "off";

if($user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_ADMIN_DOSTUP_1']] == 1){
    $dostup_class_1 = "on";
}
if($user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_ADMIN_DOSTUP_2']] == 1){
    $dostup_class_2 = "on";
}
if($user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_ADMIN_DOSTUP_3']] == 1){
    $dostup_class_3 = "on";
}
if($user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_ADMIN_DOSTUP_4']] == 1){
    $dostup_class_4 = "on";
}
if($user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_ADMIN_DOSTUP_5']] == 1){
    $dostup_class_5 = "on";
}
if($user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_ADMIN_DOSTUP_6']] == 1){
    $dostup_class_6 = "on";
}

if($user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_BLACK_LIST']] == 1){
    $black_list_class = "red";
    $black_list_text = "найден";
}
else{
    $black_list_class = "green";
    $black_list_text = "не найден";
}

if(isset($_POST['is'])){
    if(($_POST['is'] == "set_moder_user") && (isset($_SESSION['logined'])) && (isset($_SESSION['search_user'])) && (!empty(trim(($_POST['set_moder_user']))))){
        $moder = $ap->select_profile($_SESSION['logined']);
        if(($moder[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_ADMIN_DOSTUP_1']] == 1) && ($ap->search_user($_SESSION['search_user']) === true)){
            $ap->set_moder($_SESSION['search_user'], $_POST['set_moder_user']);
        }
    } 
    else if(($_POST['is'] == "ban_user") && (isset($_SESSION['logined'])) && (isset($_SESSION['search_user'])) && (!empty(trim(($_POST['ban_user']))))){
        $moder = $ap->select_profile($_SESSION['logined']);
        if(($moder[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_ADMIN_DOSTUP_5']] == 1) && ($ap->search_user($_SESSION['search_user']) === true)){
            $ap->ban_user($_SESSION['search_user'], $_POST['ban_user'], $_SESSION['logined']);
        }
    } 
    else if(($_POST['is'] == "unban_user") && (isset($_SESSION['logined'])) && (isset($_SESSION['search_user']))){
        $moder = $ap->select_profile($_SESSION['logined']);
        if(($moder[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_ADMIN_DOSTUP_5']] == 1) && ($ap->search_user($_SESSION['search_user']) === true)){
            $ap->unban_user($_SESSION['search_user']);
        }
    }
    else if(($_POST['is'] == "warn_user") && (isset($_SESSION['logined'])) && (isset($_SESSION['search_user']))){
        $moder = $ap->select_profile($_SESSION['logined']);
        if(($moder[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_ADMIN_DOSTUP_6']] == 1) && ($ap->search_user($_SESSION['search_user']) === true)){
            $ap->warn_user($_SESSION['search_user']);
        }
    }
    else if(($_POST['is'] == "unwarn_user") && (isset($_SESSION['logined'])) && (isset($_SESSION['search_user']))){
        $moder = $ap->select_profile($_SESSION['logined']);
        if(($moder[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_ADMIN_DOSTUP_6']] == 1) && ($ap->search_user($_SESSION['search_user']) === true)){
            $ap->unwarn_user($_SESSION['search_user']);
        }
    }
    else if(($_POST['is'] == "watch_logs") && (isset($_SESSION['logined'])) && (!empty(trim(($_POST['date'])))) && (isset($_SESSION['search_user'])) && ($ap->search_user($_SESSION['search_user']) === true)){
        $logs = $ap->watch_logs($_SESSION['search_user'], $_POST['date']);
        for ($i = 0; $i <= (count($logs)-1); $i++) {
            if($logs[$i][$config['DATABASE']['TABLE_LOGS_FIELDS']['FIELD_MONEY']] == 0){
                $logs_content .= '<p>'.$logs[$i][$config['DATABASE']['TABLE_LOGS_FIELDS']['FIELD_DATE']].' &nbsp; &nbsp; Игрок <a href="/panel/'.$logs[$i][$config['DATABASE']['TABLE_LOGS_FIELDS']['FIELD_NAME']].'">'.$logs[$i][$config['DATABASE']['TABLE_LOGS_FIELDS']['FIELD_NAME']].'</a> '.$logs[$i][$config['DATABASE']['TABLE_LOGS_FIELDS']['FIELD_TEXT']].' Назначение: '.$logs[$i][$config['DATABASE']['TABLE_LOGS_FIELDS']['FIELD_USES']].'</p>'; 
            }
            else{
                $logs_content .= '<p>'.$logs[$i][$config['DATABASE']['TABLE_LOGS_FIELDS']['FIELD_DATE']].' &nbsp; &nbsp; Игрок <a href="/panel/'.$logs[$i][$config['DATABASE']['TABLE_LOGS_FIELDS']['FIELD_NAME']].'">'.$logs[$i][$config['DATABASE']['TABLE_LOGS_FIELDS']['FIELD_NAME']].'</a> '.$logs[$i][$config['DATABASE']['TABLE_LOGS_FIELDS']['FIELD_TEXT']].' $'.$logs[$i][$config['DATABASE']['TABLE_LOGS_FIELDS']['FIELD_MONEY']].' Назначение: '.$logs[$i][$config['DATABASE']['TABLE_LOGS_FIELDS']['FIELD_USES']].'</p>';                                 
            }
        }
        echo($logs_content);
    }
}

if(!empty($ban)){
    $ban_class = "red";
    $ban_text = "Заблокирован {$ban[$config['DATABASE']['TABLE_BANS_FIELDS']['FIELD_ADMIN_NAME']]} до {$ban[$config['DATABASE']['TABLE_BANS_FIELDS']['FIELD_DATE']]} по причине {$ban[$config['DATABASE']['TABLE_BANS_FIELDS']['FIELD_REASON']]}";
}
else{
    $ban_class = "green";
    $ban_text = "Игрок не заблокирован";
}

if($user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_WARN']] == 0){
    $warn_class = "green";
}
else{
    $warn_class = "red";
}

$content = '

        <div class="bear_3">
            <div class="bear_4">
                <div class="bear_5">'.$user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_NAME']].'<div><a href="/search"><i class="ti-search"></i></a><a href="/panel"><i class="ti-reload"></i></a><a href="/login"><i class="ti-close"></i></a></div></div>
                <div class="bear_6 a">
                    <table>
                        <tr>
                            <td class="left">Уровень Администратора</td>
                            <td class="right"><span>'.$user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_ADMIN']].'</span></td>
                        </tr>
                        <tr>
                            <td class="left">Уровень Хелпера</td>
                            <td class="right"><span>'.$user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_HELPER']].'</span></td>
                        </tr>
                        <tr>
                            <td class="left">Уровень</td>
                            <td class="right"><span>'.$user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_LEVEL']].'</span></td>
                        </tr>
                        <tr>
                            <td class="left">Деньги</td>
                            <td class="right"><span>'.$user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_MONEY']].'$</span></td>
                        </tr>
                        <tr>
                            <td class="left">Деньги(БАНК)</td>
                            <td class="right"><span>'.$user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_BANK']].'$</span></td>
                        </tr>
                        <tr>
                            <td class="left">Донат</td>
                            <td class="right"><span>'.$user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_DONATE']].'</span></td>
                        </tr>
                        <tr>
                            <td class="left">RegIP</td>
                            <td class="right"><span class="'.$ip_class_1.'">'.$user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_REGIP']].'</span></td>
                        </tr>
                        <tr>
                            <td class="left">LastIP</td>
                            <td class="right"><span class="'.$ip_class_2.'">'.$user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_LASTIP']].'</span></td>
                        </tr>
                        <tr>
                            <td class="left">Последнее Обновление</td>
                            <td class="right"><span>'.$user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_LASTUPDATE']].'</a></span></td>
                        </tr>
                        <tr>
                            <td class="left">Обнуление Профиля</td>
                            <td class="right"><span>'.$user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_RESETPROFILE']].'</span></td>
                        </tr>
                    </table>
                </div>
                <div class="bear_6 b">
                    <div class="top_mes '.$money_class.'">Подозрительные операции '.$money_text.'</div>
                    <div class="money_box"><span>Н '.$user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_MONEY']].'$</span> + <span>Б '.$user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_BANK']].'$</span> = <span>Д '.($user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_MONEY']]+$user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_BANK']]).'$</span></div>
                    <div class="money_box_2">'.$money_logs_content.'</div>
                </div>
                <div class="bear_6 c">
                    <div class="top_mes '.$black_list_class.'">Игрок '.$black_list_text.' в ЧС</div>
                    <table>
                        <tr>
                            <td class="left">Уровень</td><td class="right"><input value="'.$user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_ADMIN']].'" type="text"></td>
                        </tr>
                        <tr>
                            <td class="left">Назначать/Снимать Админов</td><td class="right"><div class="check"><div onclick="set_prava(0);" class="'.$dostup_class_1.'"></div></div></td>
                        </tr>
                        <tr>
                            <td class="left">Назначать/Снимать Хелперов</td><td class="right"><div class="check"><div onclick="set_prava(1);" class="'.$dostup_class_2.'"></div></div></td>
                        </tr>
                        <tr>
                            <td class="left">Назначать/Снимать Лидеров</td><td class="right"><div class="check"><div onclick="set_prava(2);" class="'.$dostup_class_3.'"></div></div></td>
                        </tr>
                        <tr>
                            <td class="left">BanIP/UnbanIP</td><td class="right"><div class="check"><div onclick="set_prava(3);" class="'.$dostup_class_4.'"></div></div></td>
                        </tr>
                        <tr>
                            <td class="left">Ban/Unban</td><td class="right"><div class="check"><div onclick="set_prava(4);" class="'.$dostup_class_5.'"></div></div></td>
                        </tr>
                        <tr>
                            <td class="left">Warn/Unwarn</td><td class="right"><div class="check"><div onclick="set_prava(5);" class="'.$dostup_class_6.'"></div></div></td>
                        </tr>
                    </table>
                    <div class="button">Сохранить</div>
                </div>
                <div class="bear_6 d">
                    <div class="top_mes '.$ban_class.'">'.$ban_text.'</div>
                    <input placeholder="day" class="day"><input placeholder="month" class="month"><input placeholder="year" class="year"><input placeholder="reason" class="reason">
                    <div class="button left">Заблокировать</div><div class="button">Разблокировать</div>
                </div>
                <div class="bear_6 e">
                    <div class="top_mes '.$warn_class.'">Предупреждения '.$user[$config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_WARN']].'/3</div>
                    <div class="button left">Выдать</div><div class="button">Снять</div>
                </div>
                <div class="bear_6 f">
                    <div class="top_mes green">Подозрительные действия не найдены</div>
                    <div class="money_box_2">
                    </div>
                </div>
            </div
            ><div class="bear_4 right">
                <div onclick="set_content('."'a'".');" class="button">Статистика</div>
                <div onclick="set_content('."'b'".');" class="button">Деньги</div>
                <div onclick="set_content('."'c'".');" class="button">Выдача прав</div>
                <div onclick="set_content('."'d'".');" class="button">Бан/Разбан</div>
                <div onclick="set_content('."'e'".');" class="button">Варн/Разварн</div>
                <input placeholder="day" class="day"><input placeholder="month" class="month"><input placeholder="year" class="year">
                <div onclick="set_content('."'f'".');" class="button a">Показать</div>
            </div>
        </div>

';

?>