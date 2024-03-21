<?php
namespace app\controllers;

class User extends \app\core\Controller{

	function register() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$username = $_POST['username-input'];
			$user_password = $_POST['password-input'];
			$created_user_obj = \app\models\User::createUser($this->db_conn, $username, password_hash($user_password, PASSWORD_DEFAULT));

			
			if (is_null($created_user_obj)) {
				header('location:/User/registration-error');
			}

			else {
				//$this->view('User/create-profile', [$created_user_obj->user_id]);
				header("location:/User/update-profile/{$created_user_obj->user_id}");
			}
		}

		else {
			$this->view('User/register');
		}
	}

	function updateProfile($user_id) {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$user_obj = \app\models\User::getByUserID($this->db_conn, $user_id);
			$user_obj->first_name = $_POST['first-name-input'];
			$user_obj->middle_name = $_POST['middle-name-input'];
			$user_obj->last_name = $_POST['last-name-input'];

			$user_obj->update($this->db_conn, $user_id);
			header("location:/User/profile/{$user_id}");

		}

		else {
			$this->view('User/update-profile', $user_id);
		}

	}

	function showProfile($user_id) {
		$user_obj = \app\models\User::getByUserID($this->db_conn, $user_id);

		if (!is_null($user_obj)) {
			$pub_list = \app\models\Publication::getByUserID($this->db_conn,$user_id);
			$this->view('User/profile-header', [$user_obj->username, $user_obj->first_name, $user_obj->middle_name, $user_obj->last_name]);
			$this->view('Publication/list', $pub_list);

		}


	}

	function login() {
		if($_SERVER['REQUEST_METHOD'] === 'POST') {
			$user_obj = \app\models\User::getByUsername($this->db_conn, $_POST['username-input']);

			if (!is_null($user_obj) and password_verify($_POST['password-input'], $user_obj->password_hash)) {
				$_SESSION['user_id'] = $user_obj->user_id;
				var_dump($_SESSION);
				header("location:/User/profile/{$user_obj->user_id}");
			}
		}

		else {
			$this->view('User/login');
		}

	}


	function loginRequired() {
		$this->view('User/login-required');
	}

}

?>