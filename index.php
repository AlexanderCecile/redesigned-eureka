<?php
use app\core\App;
require_once('app/core/init.php');

$host = 'localhost';
$dbname = 'socmed';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//new App();
echo '<pre>';
$t1 = \app\models\User::getByUsername($conn, 'username1');

var_dump($t1);


$t2 = \app\models\Publication::getByUserID($conn, $t1->user_id);

var_dump($t2);

echo '</pre>';
?>