<?php
session_start();
$_admin = false; 
// Connexion variables
/* for deployment only
define('DB_HOST', 'thomaslayradmin.mysql.db');
define('DB_PORT', '');
define('DB_NAME', 'thomaslayradmin');
define('DB_USER', 'thomaslayradmin');
define('DB_PASS', '__');
*/
define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
define('DB_NAME', 'dooodle');
define('DB_USER', 'root');
define('DB_PASS', 'root');
//Setup pdo

exit;

try
{
    $pdo = new PDO(
        'mysql:host='.DB_HOST.';dbname='.DB_NAME.';port='.DB_PORT, 
        DB_USER, 
        DB_PASS
    );
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}
catch(PDOException $e)
{
    die("Erreur ! :" . $e->getMessage());
}
