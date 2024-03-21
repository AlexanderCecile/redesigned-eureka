<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update profile</title>
</head>
<body>
	<form method="post" action="/User/update-profile/<?php echo $data; ?>">
		<label for="first-name-input">first name:</label>
		<input type="text" name="first-name-input">

		<label for="middle-name-input">middle name:</label>
		<input type="text" name="middle-name-input">

		<label for="last-name-input">last name:</label>
		<input type="text" name="last-name-input">

		<button type="submit" value="">Submit</button>

	</form>

</body>
</html>