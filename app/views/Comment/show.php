<?php
foreach ($data as $curr_comm) {
	echo "<article><h3>Posted by <a href='/User/{$curr_comm->user_id}'>{$curr_comm->username}</a></h3>{$curr_comm->comment_body}</article>";
}
?>
