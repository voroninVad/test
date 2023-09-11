<?
session_start();
$email_user = $_SESSION['email'];
$connection = new PDO('mysql:host=localhost; dbname=diplom_v2.0;', 'root','root');
$profile_user=$connection->query("SELECT * FROM users WHERE email = '$email_user'");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Профиль</title>
	<link rel="stylesheet" type="text/css" href="style\index.css">
</head>
<body>

<div class="header">
	<div class="left_header">
		<?if (empty($email_user)){?>
		<a href="register.php">Регистрация</a> |
		<a href="input.php">Вход</a><br>
		<?}else{?>
		<a href="profile.php">Переход в профиль</a><br>
		<a href="input.php">Выйти из профиля</a>
		<?}?>
	</div>
	<div class="center_header">
		логип\название
	</div>
	<div class="right_header">
		корзина\контакты
	</div>
</div>

<div class="main">

	<div class="navigation">
		<div class="menu_navigation"><a href="index.php">Главная</a></div>
		<div class="menu_navigation"><a href="">Каталог</a></div>
		<div class="menu_navigation"><a href="">Контакты</a></div>
		<div class="menu_navigation"><a href="">О нас</a></div>
		<div class="menu_navigation"><a href="">Каталог</a></div>
	</div>

	<div class="menu">
		меню
		<select>
			<option></option>
			<option></option>
			<option></option>
		</select>
	</div>

	<div class="profile_user">
		<h3>Профиль</h3>
	<?while ($row = $profile_user->fetch(PDO::FETCH_ASSOC)) {?>

		<div class="photo">
		<?
		echo '<img src = "data:image/png;base64,' . base64_encode($row['photo']) . '" width = "100px" height = "100px"/>';
		?>					
		</div>
 						
 		<?echo 		
				'<label>'.$row['name'].'</label>
				<label>'.$row['lastname'].'</label><br><br>';

		}
	?>


	</div>

</div>

<div class="footer">
	
</div>




</body>
</html>