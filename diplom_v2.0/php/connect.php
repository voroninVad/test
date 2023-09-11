<?

		$connection = new PDO('mysql:host=localhost; dbname=diplom_v2.0;', 'root','root');

		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


		$dbcon=mysqli_connect('localhost','root','root','diplom_v2.0');


?>