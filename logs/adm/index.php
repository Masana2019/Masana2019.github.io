<?
session_start();
//INCLUDED CONFIG
require_once('system/Config.php');
require_once('pages/main.php');

if($_SERVER['REQUEST_URI'] == "/"){
    if(isset($_SESSION['logined'])){
        header("Location: /search");
    }
    else{
        header("Location: /login"); 
    }
}
else if($_SERVER['REQUEST_URI'] == "/login"){
    require_once('pages/login.php');
    if(isset($_SESSION['logined'])){
        unset($_SESSION['logined']); 
        unset($_SESSION['search_user']);
        echo($head.$content.$footer);
    }
    else{
        echo($head.$content.$footer);       
    }
}
else if($_SERVER['REQUEST_URI'] == "/search"){
    require_once('pages/search.php');
    if(isset($_SESSION['logined'])){
        if(isset($_SESSION['search_user'])){
            unset($_SESSION['search_user']);
        }
        echo($head.$content.$footer);
    }
    else{
        header("Location: /login"); 
    }
}
else if($_SERVER['REQUEST_URI'] == "/panel"){
    require_once('pages/panel.php');
    if(isset($_SESSION['logined'])){
        if(isset($_SESSION['search_user'])){
            echo($head.$content.$footer);          
        }
        else{
            header("Location: /search"); 
        }
    }
    else{
        header("Location: /login"); 
    }
}

?>