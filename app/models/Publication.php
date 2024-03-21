<?php

namespace app\models;

use PDO;

class Publication {
	public string $publication_id;
	public string $user_id;
	public string $publication_title;
	public string $publication_body;
	public ?string $timestamp;
	public string $publication_status;

	public static function getByPublicationID(PDO $db_conn, $publication_id) {
		$raw_sql = 'SELECT * FROM `publication` WHERE `publication_id` = :publication_id';
		$statement = $db_conn->prepare($raw_sql);
		$statement->bindValue(':publication_id', $publication_id);

		$statement->setFetchMode(PDO::FETCH_CLASS, Publication::Class);
		$statement->execute();
		return $statement->fetch();
	}

	public static function getByUserID(PDO $db_conn, $user_id) {
		$raw_sql = 'SELECT * FROM `publication` WHERE `user_id` = :user_id';
		$statement = $db_conn->prepare($raw_sql);
		$statement->bindValue(':user_id', $user_id);

		$statement->setFetchMode(PDO::FETCH_CLASS, Publication::Class);
		$statement->execute();
		return $statement->fetchAll();
	}


	public static function getAll(PDO $db_conn) {
		$raw_sql = 'SELECT * FROM `publication` WHERE `publication_status` = \'public\'';
		$statement = $db_conn->prepare($raw_sql);


		$statement->setFetchMode(PDO::FETCH_CLASS, Publication::Class);
		$statement->execute();
		return $statement->fetchAll();
	}

	public function insert(PDO $db_conn) {
		$raw_sql = 'INSERT INTO `publication` (`publication_id`, `user_id`, `publication_title`, `publication_body`, `timestamp`, `publication_status`) VALUES (NULL, :user_id, :publication_title, :publication_body, NULL, :publication_status)';
		$statement = $db_conn->prepare($raw_sql);
		$statement->execute((array)$this);

	}



}
?>