<?php

session_start();

$_SESSION['loggedIn'] = false;

#Unset all session variables.
foreach ($_SESSION as $key => $value) {
    $_SESSION[$key] = '';
    unset($_SESSION[$key]);
}

#Empty out the session array.
$_SESSION = array();

#If the session is using cookies unset those.
if (ini_get('session.use_cookies')) {
    $cookieParameters = session_get_cookie_params();
    setcookie(session_name(), '', time() - 28800, $cookieParameters['path'], $cookieParameters['domain'], $cookieParameters['secure'], $cookieParameters['httponly']);
}

#Destroy the session.
session_destroy();

#Go to the login page.
die(header('location: ../index.php'));
