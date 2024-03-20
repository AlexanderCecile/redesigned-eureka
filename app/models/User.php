<?php

namespace app\models;

use PDO;

class User {
	public string $user_id;
	public string $username;
	public string $password_hash;

	public string $first_name;
	public string $middle_name;
	public string $last_name;

	public static function getByUserID(PDO $db_conn, $user_id) {
		$raw_sql = 'SELECT * FROM `user` WHERE `user_id` = :user_id';
		$statement = $db_conn->prepare($raw_sql);
		$statement->bindValue(':user_id', $user_id);

		$statement->setFetchMode(PDO::FETCH_CLASS, User::class);
		$statement->execute();
		return $statement->fetch();
	}

	public static function getByUsername(PDO $db_conn, $username) {
		$raw_sql = 'SELECT * FROM user WHERE username = :username';
		$statement = $db_conn->prepare($raw_sql);
		$statement->bindValue(':username', $username);

		$statement->setFetchMode(PDO::FETCH_CLASS, User::class);
		$statement->execute();
		return $statement->fetch();
	}

	public static function createUser(PDO $db_conn, $username, $password_hash) {
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