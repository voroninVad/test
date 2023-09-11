<?
session_start();
$data_input = $_SESSION['email'];
include('php/function_basket.php');
$remove_basket = new Basket_for_user();
$remove_basket->remove_from_cart($_GET['id_del_tovar']);
$users_basket = new Basket_for_user();
$users_basket->add_to_basket($_GET['add_tovar_to_basket']);

$connection = new PDO('mysql:host=localhost; dbname=diplom_v2.0;', 'root','root');
$tovars=$connection->query("SELECT * FROM tovars");
$tovarsInBasket = $connection->query("SELECT * FROM basket join tovars on basket.id_tovar = tovars.id ");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Главная</title>
	<link rel="stylesheet" type="text/css" href="style\index.css">
	<link rel="stylesheet" type="text/css" href="style\index_form_inp_reg.css">
</head>
<body>

<div class="header">
	<div class="left_header">
		<?if (empty($data_input)){?>
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
		<a href="basket.php">Корзина</a> 
		\контакты
	</div>
</div>

<div class="main">

	<div class="navigation">
		<div class="menu_navigation"><a href="">Главная</a></div>
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

	<div class="form_for_autoriz">
		<div class="form_for_but" id="form_for_but">
				<a onclick="return open_form_autoriz(this)" type="submit" id="autoriz" name="autoriz" >
					<img src="photo_user_default\profile-image.png.png">
				</a><br><br>
		</div>
			<div id="form_autoriz">
				<div id="form" class="form">
						<div class="close_but">
							<input onclick="return close_form_autoriz(this)" type="submit" name="close" value="X">
						</div>
						<form method="post">
							<label>Email:</label><br><br>
							<input type="email" autocomplete="off" name="email"><br><br>
							<label>Password:</label><br><br>
							<input type="password" autocomplete="off" name="password"><br><br>
						</form>
				</div>
			</div>
		<script type="text/javascript" src="js/form_autoriz.js"></script>
	</div>

	<div class="tovars">
		<div class="tovar">
			<h3>Товары</h3>
		<?while ($row = $tovars->fetch(PDO::FETCH_ASSOC)) {?>
			<div class="photo">
			<?
			echo 
				'<img src = "data:image/png;base64,'. base64_encode($row['image']).'" width = "100px" height = "100px"/>';
			?>					
			</div>
	 						
	 		<?echo 		
					'<label>'.$row['name'].'</label><br><br>
					<b><p>'.$row['price'].'</p></b>
					<a href="?add_tovar_to_basket= '.$row['id'].'">В корзину</a><br><br>';
					
			?>
			<?}?>


		</div>

	</div>

</div>

<div class="footer">

</div>

</body>
</html>