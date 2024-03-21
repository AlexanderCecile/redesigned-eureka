<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update profile</title>
</head>
<body>
	<form method="post" action="/User/update-profile/<?php echo $data; ?>">
		<label>first name:<input type="text" name="first-name-input"></label>

		<label>middle name:<input type="text" name="middle-name-input"></label>
		
		<label>last name:<input type="text" name="last-name-input"></label>
		

		<button type="submit">Submit</button>

	</form>

</body>
</html>