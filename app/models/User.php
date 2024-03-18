<?php

namespace app\models;

use PDO;

class User {
	public ?string $user_id;
	public ?string $username;
	public ?string $password_hash;

	public static function getByUsername($db_conn, $username) {
		$raw_sql = 'SELECT * FROM user WHERE username = :username';
		$statement = $db_conn->prepare($raw_sql);
		$statement->bindValue(':username', $username);

		$statement->setFetchMode(PDO::FETCH_CLASS, User::class);
		$statement->execute();
		return $statement->fetch();
	}

	public static function createUser($db_conn, $username, $password_hash) {
		$raw_sql = 'INSERT INTO user (username,password_hash) VALUES(:username,:password_hash)';
		$statement = $db_conn->prepare($raw_sql);
		$statement->bindValue(':username', $username);
		$statement->bindValue(':password_hash', $password_hash);

		try {
			$statement->execute();
			return User::getByUsername($db_conn, $username);
		}

		catch (\PDOException $e) {
			if ($e->getCode() == '23000') {
				return null;
			}
			else {
				throw $e;
				
			}
		}
	}

}

?>