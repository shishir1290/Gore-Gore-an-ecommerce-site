<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<?php include('header.php'); ?>
	<div class="login-container">
		<h1>Login</h1>
		<form action="../controlar/loginAction.php" method="post" novalidate>
			<label for="username">Username</label>
			<input type="text" id="username" name="username" required>
			<label for="password">Password</label>
			<input type="password" id="password" name="password" required>
			<input type="submit" value="Login">
		</form>
	</div>
	<?php include('footer.php'); ?>
</body>
</html>
