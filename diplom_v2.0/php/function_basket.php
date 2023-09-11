<?
include('php/connect.php');

/**
 *  добавление товаров в корзину
 */
class Basket_for_user
{

	function add_to_basket($add_tovar)
	{
		// сделать чтобы не добавлял один товар несколько раз(двумя и более запясями) 

		$dbcon=mysqli_connect('localhost','root','root','diplom_v2.0');
		$connection = new PDO('mysql:host=localhost; dbname=diplom_v2.0;', 'root','root');
		$tovars_in_basket = $connection->query("SELECT * FROM `basket`");

		

		if (isset($add_tovar)) {

			

					$basket="INSERT INTO  `basket` (`id_tovar`,`amount`) VALUES ('$add_tovar','1')";
					$result=mysqli_query($dbcon,$basket);
					header('Location: index.php');


					// $add = new Basket_for_user();
					// $add->add_amount_to_basket($add_tovar," ");
					// header('Location: index.php');

				
		}		
			
	}
	 
	function add_amount_to_basket($but_plus,$but_minus)
	{
		$dbcon=mysqli_connect('localhost','root','root','diplom_v2.0');
		$connection = new PDO('mysql:host=localhost; dbname=diplom_v2.0;', 'root','root');
		$tovars_in_basket = $connection->query("SELECT * FROM `basket`");

		if (!empty($but_plus)){

			foreach ($tovars_in_basket as $tovar_from_the_basket) {

				$amount_tovar = $tovar_from_the_basket['amount'];

				if ($tovar_from_the_basket['id_tovar'] == $but_plus) {
					
					$amount_tovar++;
					$new_amount="UPDATE `basket` SET `amount`='$amount_tovar' WHERE id_tovar = $but_plus";
					$result=mysqli_query($dbcon,$new_amount);
					header('Location: basket.php');

				}
			}

		}elseif (!empty($but_minus)){

			foreach ($tovars_in_basket as $tovar_from_the_basket) {

				$amount_tovar = $tovar_from_the_basket['amount'];

				if ($tovar_from_the_basket['id_tovar'] == $but_minus) {
					
						$amount_tovar--;

						if ($amount_tovar == 0) {

							$remove = new Basket_for_user();
							$remove->remove_from_cart($but_minus);

						}
						else{

							$new_amount="UPDATE `basket` SET `amount`='$amount_tovar' WHERE id_tovar = $but_minus";
							$result=mysqli_query($dbcon,$new_amount);
							header('Location: basket.php');

						}

				}
			}
		}
	}

	function remove_from_cart($id_del_tovar){

		if (!empty($id_del_tovar)){

			$dbcon=mysqli_connect('localhost','root','root','diplom_v2.0');
			$delet_cart = "DELETE FROM `basket` WHERE id_tovar = '$id_del_tovar'";
			$result=mysqli_query($dbcon,$delet_cart);
			header('Location: basket.php');

		}

	}
}

?>