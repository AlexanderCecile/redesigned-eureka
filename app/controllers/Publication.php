<?php
namespace app\controllers;

use \PDO;

class Publication extends \app\core\Controller {

	function showList() {
		$pub_list = \app\models\Publication::getAll($this->db_conn);

		$this->view('Publication/list', $pub_list);
	}

	function show($publication_id) {
		echo '<pre>';
		var_dump($_REQUEST);
		var_dump($_SERVER);
		echo $publication_id;
		debug_print_backtrace();
		echo '</pre>';
		$pub = \app\models\Publication::getByPublicationID($this->db_conn, $publication_id);
		if ($pub !== false) {
			$pub_comments = \app\models\Comment::getByPublicationID($this->db_conn, $publication_id);
			foreach ($pub_comments as $curr_comm) {
				$curr_comm->username = \app\models\User::getByUserID($this->db_conn,$curr_comm->user_id)->username;
			}

			$pub->username = \app\models\User::getByUserID($this->db_conn, $pub->user_id)->username;

			$this->view('Publication/show', [$pub]);
			$this->view('Comment/show',$pub_comments);
		}

		else {
			// redirect to generic 503 error page?
			//header('location:/Main');
		}

	}

	function publicationFeed() {
		echo '<h2>Publication Feed</h2>';
		var_dump($_SESSION);
		var_dump($_SERVER);
		$this->view('Publication/create-publication');
		echo '<hr>';
		$this->showList();
	}

	//#[\app\filters\IsLoggedIn]
	function create() {
		var_dump($_SERVER);
		var_dump($_REQUEST);
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			
			$pub = new \app\models\Publication;
			$pub->user_id = $_SESSION['user_id'];
			$pub->publication_title = $_POST['publication-title'];
			$pub->publication_body = $_POST['publication-body'];
			$pub->publication_status = $_POST['publication-visibility'];

			$pub->insert($this->db_conn);
			//header("location:/User/profile/{$_SESSION['user_id']}");

		}

	}
}

?>