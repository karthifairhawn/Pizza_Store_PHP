<?php 

	$conn = mysqli_connect('localhost','karthi','karthi12','ninja_pizza');

	if(!$conn){
		echo 'Error in connection', mysqli_connect_error();
	}
?>

<!DOCTYPE html>
<html>

	
	<?php include('templates/header.php'); ?>

	<?php include('templates/footer.php'); ?>

</html>