<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>

	<form method="post" action="/User/login">
		<label for="email-input">email:</label>
		<input type="email" name="email-input">

		<label for="password-input">password:</label>
		<input type="password-input" name="password-input">

		<button type="submit" name="action" value="">Register</button>

	</form>
	<a href="/User/register">Go to registration page</a>

</body>
</html>