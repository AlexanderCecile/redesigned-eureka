<ul>
<?php
foreach ($data as $curr_pub) {
	echo "<li><a href='/Publication/{$curr_pub->publication_id}'>{$curr_pub->publication_title}</a> </li>";
}


?>

</ul>