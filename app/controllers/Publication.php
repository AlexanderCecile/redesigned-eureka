<?php
namespace app\controllers;

use \PDO;

class Publication extends \app\core\Controller {

	function showList() {
		$pub_list = \app\models\Publication::getAll($this->db_conn);

		$this->view('Publication/list', $pub_list);
	}

	function show($publication_id) {
		$pub = \app\models\Publication::getByPublicationID($this->db_conn, $publication_id);
		$pub_comments = \app\models\Comment::getByPublicationID($this->db_conn, $publication_id);
		foreach ($pub_comments as $curr_comm) {
			$curr_comm->username = \app\models\User::getByUserID($this->db_conn,$curr_comm->user_id)->username;
		}

		$pub->username = \app\models\User::getByUserID($this->db_conn, $pub->user_id)->username;


		

		$this->view('Publication/show', [$pub]);
		$this->view('Comment/show',$pub_comments);

	}
}

?>