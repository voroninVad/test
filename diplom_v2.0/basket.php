<?
session_start();
$data_input = $_SESSION['email'];
include('php/function_basket.php');
$users_basket = new Basket_for_user();
$users_basket->remove_from_cart($_GET['id_del_tovar']);
$users_basket->add_amount_to_basket($_GET['but_plus_tovar'],$_GET['but_minus_tovar']);

$connection = new PDO('mysql:host=localhost; dbname=diplom_v2.0;', 'root','root');
$tovarsInBasket = $connection->query("SELECT * FROM basket join tovars on basket.id_tovar = tovars.id ");
$itog_price = $connection->query("SELECT *  FROM basket join tovars on basket.id_tovar = tovars.id");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Корзина</title>
	<link rel="stylesheet" type="text/css" href="style\index.css">
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
		<div class="menu_navigation"><a href="index.php">Главная</a></div>
		<div class="menu_navigation"><a href="">Каталог</a></div>
		<div class="menu_navigation"><a href="">Контакты</a></div>
		<div class="menu_navigation"><a href="">О нас</a></div>
		<div class="menu_navigation"><a href="">Каталог</a></div>
	</div>

	<div class="h1"><h1>Моя корзина</h1></div>
		<?while ($row = $tovarsInBasket->fetch(PDO::FETCH_ASSOC)) {
				echo 
				'<div class="basket_tovar">
					<div class="photo">
					
		<img src = "data:image/png;base64,' . base64_encode($row['image']) . '" width = "100px" height = "100px"/>
					</div>
						<div class="productText">
							<label>'.$row['name'].'</label><br><br><label>Количество товара: </label><br><br>
							<div class="but_minus"><a href="?but_minus_tovar= '.$row['id'].'">-</a></div>
							<label>'.$row['amount'].'</label>
							<div class="but_plus"><a href="?but_plus_tovar= '.$row['id'].'">+</a></div>
							<p>'.$row['price'].' руб.</p>
						</div>
						<a href="?id_del_tovar= '.$row['id'].'">Удалить из корзины</a>
				</div><br><br>';

		}

		?>
		<?$summ=0;
			while ($row = $itog_price->fetch(PDO::FETCH_ASSOC)) {
				$summ+= $row['price']*$row['amount']; 
			}?>
		<div class="h1"><h1>Итоговая стоимость: <?echo $summ;?> руб.</h1></div>
</div>

</body>
</html>