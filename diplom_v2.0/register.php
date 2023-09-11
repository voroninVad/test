<?

include('php/register.php');
$register_user = new Register();
$register_user->reg_user($_POST['reg'],$_FILES['photo']['tmp_name'],$_POST['name_user'],$_POST['lastname_user'],$_POST['email'],$_POST['password'],$_POST['povtor_password']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
</head>
<body>
<a href="register.php">Регистрация</a> |
<a href="input.php">Вход</a>
<div class="form_register">
	<form id="main" method="post" onsubmit="return check_register(this)" enctype="multipart/form-data">
		<label>Добавить свое фото</label><br><br>
		<input type="file" name="photo"><br><br>
		<label>Имя<label style="color: red">*</label></label><br><br>
		<input type="text" autocomplete="off" required name="name_user"><br><br>
		<label>Фамилия<label style="color: red">*</label></label><br><br>
		<input type="text" autocomplete="off" required name="lastname_user"><br><br>
		<label>Email<label style="color: red">*</label></label><br><br>
		<input type="email" autocomplete="off" required name="email"><br><br>
		<label>Пароль<label style="color: red">*</label></label><br><br>
		<input type="password" autocomplete="off" required name="password"><br><br>
		<label>Повторите пароль<label style="color: red">*</label></label><br><br>
		<input type="password" autocomplete="off" required name="povtor_password"><br><br>
		<div id="error_password"></div><br><br>
		<input type="submit" name="reg" value="Зарегистрироваться">
	</form>
		<script type="text/javascript" src="js/reg.js"></script>
</div>

</body>
</html>