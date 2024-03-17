<?php
use app\core\App;
require('app/core/init.php');
require('app/models/User.php');

//new App();
echo '<pre>';
$test_user = new \app\models\User();
$test_user->getByUsername('username1');

var_dump($test_user);

echo '</pre>';
?>