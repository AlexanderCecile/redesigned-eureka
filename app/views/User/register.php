<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
</head>
<body>

	<form method="post" action="/User/register">
		<label for="username-input">username:</label>
		<input type="text" name="username-input">

		<label for="password-input">password:</label>
		<input type="password-input" name="password-input">

		<button type="submit" name="action" value="">Register</button>

	</form>
	<a href="/User/login">Go to login page</a>

</body>
</html>