<?php

#The username password and database name for the site.
$dbUsr = 'MistakenElf';
$dbPass = 'fitme1990';
$dbDatabase = 'fitme';

//Connect to the database.
$connection = mysqli_connect('localhost', $dbUsr, $dbPass, $dbDatabase);

//Check the connection.
if (!$connection) {
    die('Unable to connect to MySql Server');
}
