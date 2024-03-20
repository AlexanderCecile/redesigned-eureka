<?php

namespace app\models;

use PDO;

class Comment {
	public string $comment_id;
	public string $user_id;
	public string $username;
	public string $publication_id;
	public string $comment_body;
	public ?string $timestamp;

	public static function getByPublicationID(PDO $db_conn, $publication_id) {
		$raw_sql = 'SELECT * FROM comment WHERE publication_id = :publication_id';
		$statement = $db_conn->prepare($raw_sql);
		$statement->bindValue(':publication_id', $publication_id);

		$statement->setFetchMode(PDO::FETCH_CLASS, Comment::Class);
		$statement->execute();
		return $statement->fetchAll();
	}


}
?>