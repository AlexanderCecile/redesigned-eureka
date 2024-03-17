<?php

namespace app\models;

use PDO;

class User extends \app\core\Model {
	public string $user_id;
	public string $username;
	public string $password_hash;
	/*
	private function __construct(string $user_id='', string $username='', string $password_hash='') {
		parent::__construct();
		$this->user_id = $user_id;
		$this->username = $username;
		$this->password_hash = $password_hash;
	}
	*/
	


	public function getByUsername($username) {
		$raw_sql = 'SELECT * FROM user WHERE username = :username';
		$statement = self::$_conn->prepare($raw_sql);
		$statement->bindValue(':username', $username);

		$statement->setFetchMode(PDO::FETCH_INTO, $this);
		$statement->execute();
		
		
		return $statement->fetch();;

	}

}

?>