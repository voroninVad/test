<?

include('connect.php');


class Register
{
	
	function reg_user($but_reg,$photo_user,$name,$lastname,$email,$pass,$povt_pass)
	{
		

			if (!empty($email)) {
				$connection = new PDO('mysql:host=localhost; dbname=diplom_v2.0;', 'root','root');
				$prov_email=$connection->query("SELECT * FROM users");
				foreach ($prov_email as $mail) {
					if ($email == $mail['email']) {
						echo '<script>alert("Такой Email уже используется");</script>';
					}
				}
			}
			
			if (!empty($email) && empty($photo_user)) {
				$photo_default = "C:\OSPanel\domains\localhost\diplom_v2.0\photo_user_default\profile-image.png.png";
				$photo = addslashes(file_get_contents($photo_default));
				$dbcon=mysqli_connect('localhost','root','root','diplom_v2.0');
				$reg="INSERT INTO  `users` (`photo`,`name`,`lastname`,`email`,`pass`,`status`) 
				VALUES ('$photo','$name','$lastname','$email','$pass','user')";
				$result=mysqli_query($dbcon,$reg);
				header('Location: input.php');
			}
			elseif (!empty($email) && !empty($photo_user)){
				$photo = addslashes(file_get_contents($photo_user));
				$dbcon=mysqli_connect('localhost','root','root','diplom_v2.0');
				$reg="INSERT INTO  `users` (`photo`,`name`,`lastname`,`email`,`pass`,`status`) 
				VALUES ('$photo','$name','$lastname','$email','$pass','user')";
				$result=mysqli_query($dbcon,$reg);
				header('Location: input.php');
			}			
		
	}
}

?>