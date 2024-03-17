<?php
use app\core\App;
require('app/core/init.php');
require('app/models/User.php');

//new App();

$test_user = new \app\models\User();
print_r($test_user);
$t_1 = $test_user->getByUsername('username1');


print_r($test_user);
var_dump($t_1);
?>