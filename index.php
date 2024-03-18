<?php
use app\core\App;
require_once('app/core/init.php');
require_once('app/models/User.php');

$host = 'localhost';
$dbname = 'socmed';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//new App();
echo '<pre>';
$test_user = \app\models\User::getByUsername($conn, 'username1');

var_dump($test_user);

$new_user = \app\models\User::createUser($conn, 'username9', 'passwordhash2');

var_dump($new_user);

echo '</pre>';
?>