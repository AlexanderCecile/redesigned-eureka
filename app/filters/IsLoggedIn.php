<?php
namespace app\filters;

#[\Attribute]
class IsLoggedIn implements \app\core\AccessFilter{

	public function redirected() {
		if(isset($_SESSION['user_id'])){
			return true;
		}
		header('location:/User/login-required');
		return false;
	}

}

?>