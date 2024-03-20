

<article>
	<h1><?php echo $data[0]->publication_title; ?></h1>
	<h3>Posted by <a href='/User/<?php echo $data[0]->user_id;?>'><?php echo $data[0]->username; ?></a></h3>
	<p><?php echo $data[0]->publication_body; ?></p>

</article>