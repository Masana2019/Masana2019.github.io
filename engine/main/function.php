<?php
function startSession($isUserActivity=true, $prefix=null) {
    $sessionLifetime = 1;
    $idLifetime = 1;

    if ( session_id() ) return true;
    session_name('MYPROJECT'.($prefix ? '_'.$prefix : ''));
    ini_set('session.cookie_lifetime', 0);
    if (!session_start()) return false;

    $t = time();

    if ( $sessionLifetime ) {
        if ( isset($_SESSION['lastactivity']) && $t-$_SESSION['lastactivity'] >= $sessionLifetime ) {
            destroySession();
			accountexit();
            return false;
        }
        else {
            if ( $isUserActivity ) $_SESSION['lastactivity'] = $t;
        }
    }

    if ( $idLifetime ) {
        if ( isset($_SESSION['starttime']) ) {
            if ( $t-$_SESSION['starttime'] >= $idLifetime ) {
                session_regenerate_id(true);
                $_SESSION['starttime'] = $t;
            }
        }
        else {
            $_SESSION['starttime'] = $t;
        }
    }

    return true;
}

function destroySession() {
    if ( session_id() ) {
        session_unset();
        setcookie(session_name(), session_id(), time()-60*60*24);
        session_destroy();
    }
}
?>