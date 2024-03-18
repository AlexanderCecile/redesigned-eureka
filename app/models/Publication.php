<?php

namespace app\models;

use PDO;

class Publication {
	public ?string $publication_id;
	public ?string $parent_publication_id;
	public ?string $user_id;
	public ?string $publication_title;
	public ?string $publication_text;
	public ?string $timestamp;
	public ?string $publication_status;


}
?>