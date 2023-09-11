<?

include('php/admin.php');
$function_admin = new Admin();
$function_admin->function_admin($_POST['name_email'],$_POST['new_name_status']);

$search_user_for_email = $_POST['email_user'];

$connection = new PDO('mysql:host=localhost; dbname=diplom_v2.0;', 'root','root');
$user_for_admin = $connection->query("SELECT * FROM `users` WHERE `email` = '$search_user_for_email' AND `email` != 'admin@mail.ru'");
?>

<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	<link rel="stylesheet" type="text/css" href="style/admin.css">
</head>
<body>

<b><p>Админка</p></b>

<div class="status_form">
	<form method="post">
		<div class="search">
			<form method="post">
				<label>Поиск пользователя по email</label><br><br>
				<input type="email" name="email_user">
				<input type="submit" name="search_user" value="Найти"><br><br>
			</form>
		</div>
		<table>
			<caption>Пользоватль и его статус на сайте</caption>
			<tr>
			<th>Имя</th>
			<th>Фамилия</th>
			<th>Email</th>
			<th>Status</th>
			<th>Изменить_статус</th>
			</tr>
				<?while ($row = $user_for_admin->fetch(PDO::FETCH_ASSOC)) {?>
					<?if($row != ""){?>
					<form method="post">
						<tr>
								<td><?=$row['name']?></td>
								<td><?=$row['lastname']?></td>
								<td><?echo '<input type="text"  name="name_email" value="'.$row['email'].'">';?></td>
								<td><?=$row['status']?></td>
								<td>
									<select name="new_name_status">
										<option>user</option>
										<option>admin</option>
										<option>ban</option>
									</select><br>
									<input type="submit" name="new_status_user" value="Изменить"> 
							
						</td>
						</tr>
					</form>
					<?}else{?> 
						<!-- не выводит значение иначе -->
					<tr><td>Пользователя с таким Email не найдено</td><tr><br>
					<?}?>
				<?}?>
		</table>
	
</div>


</body>
</html>