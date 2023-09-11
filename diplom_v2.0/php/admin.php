<?


class Admin
{
	
	function function_admin($name_email,$new_name_status)
	{
		if (!empty($new_name_status)) {
			$dbcon=mysqli_connect('localhost','root','root','diplom_v2.0');
	        $qry="UPDATE users SET `status`='$new_name_status' WHERE `email`='$name_email'";
	        $result=mysqli_query($dbcon,$qry);
		}
	}
}

?>