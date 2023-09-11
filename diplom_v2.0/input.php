<?

include('php/input.php');
$autoriz = new Autoriz();
$autoriz->autoriz_user($_POST['autoriz'],$_POST['email'],$_POST['password']);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Вход</title>
</head>
<body>
<a href="register.php">Регистрация</a> |
<a href="input.php">Вход</a>

<div class="form_autoriz">
	<form method="post">
		<label>Email</label><br><br>
		<input type="email" name="email"><br><br>
		<label>Пароль</label><br><br>
		<input type="password" name="password"><br><br>
		<input type="submit" name="autoriz" value="Войти">
	</form>
</div>
</body>
</html>