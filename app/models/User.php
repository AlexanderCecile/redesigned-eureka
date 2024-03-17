<?php

namespace app\models;

use PDO;

class User extends \app\core\Model {
	public $user_id;
	public $username;
	public $password_hash;


	/*
	This feels strange. Since this isn't a static function, aren't we creating a dummy User object only to throw it away almost immediately?

	Returns a User object or false.
	*/
	public function getByUsername($param_username) {
		$raw_sql = 'SELECT * FROM user WHERE username = :username';
		$statement = self::$_conn->prepare($raw_sql);
		$statement->bindValue(':username', $param_username);
		$statement->execute();
		$statement->setFetchMode(PDO::FETCH_CLASS, 'app\models\User');
		return $statement->fetch();
	}

}

?>