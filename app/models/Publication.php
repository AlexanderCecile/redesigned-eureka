<?php

namespace app\models;

use PDO;

class Publication {
	public string $publication_id;
	public string $user_id;
	public string $publication_title;
	public string $publication_text;
	public ?string $timestamp;
	public string $publication_status;

	public static function getByUserID(PDO $db_conn, $user_id) {
		$raw_sql = 'SELECT * FROM publication WHERE user_id = :user_id';
		$statement = $db_conn->prepare($raw_sql);
		$statement->bindValue(':user_id', $user_id);

		$statement->setFetchMode(PDO::FETCH_CLASS, Publication::Class);
		$statement->execute();
		return $statement->fetchAll();
	}



}
?>