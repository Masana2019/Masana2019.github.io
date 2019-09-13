<?

require_once($_SERVER['DOCUMENT_ROOT']."/system/Config.php");

if($_SERVER['REQUEST_URI'] == "/login"){
    $title = $config['PAGES_NAMES']['LOGIN'];
}
else if($_SERVER['REQUEST_URI'] == "/search"){
    $title = $config['PAGES_NAMES']['SEARCH'];
}
else if($_SERVER['REQUEST_URI'] == "/panel"){
    $title = $config['PAGES_NAMES']['PANEL'];
}

$head = '

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css" rel="stylesheet">
        <title>'.$title.' - '.$config['PROJECT']['NAME'].'</title>
    </head>
    <body>

';

$footer = '

        <script src="js/main.js"></script>
    </body>
</html>

';

?>