<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<form action="<?= base_url(); ?>api/auth/login" method="post">
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td colspan="2"><button type="submit" name="login">Login</button></td>
			</tr>
		</table>
	</form>
</body>
</html>