<?
session_start();
include('connect.php');

class Autoriz
{
	function autoriz_user($but_auriz,$post_email,$post_pass)
	{
		$email = $post_email;
		$pass = $post_pass;
		$_SESSION['email'] = $email;
		
		if (isset($but_auriz)) {
			ob_start();
			$prov_data_user = false;
			if (!empty($email)) {
				$connection = new PDO('mysql:host=localhost; dbname=diplom_v2.0;', 'root','root');
				$autoriz=$connection->query("SELECT * FROM users");
				foreach ($autoriz as $user) {
					if ($email == $user['email'] && $pass == $user['pass'] && $user['status'] == 'user') {
						$prov_data_user = true;
						header('Location: profile.php');
					}
					elseif ($email == $user['email'] && $pass == $user['pass'] && $user['status'] == 'admin') {
						header('Location: admin.php');
					}
					elseif ($email == $user['email'] && $pass == $user['pass'] && $user['status'] == 'ban') {
						echo "<script>alert('".$user['name'].", админ решил вас забанить');</script>";
					}
				}
			}elseif ($prov_data_user == false && empty($email)) {
				echo '<script>alert("Проверте введенные данные");</script>';
			}
		}
	}
}


	


?>