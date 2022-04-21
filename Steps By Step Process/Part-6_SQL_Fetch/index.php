<?php 

	$conn = mysqli_connect('localhost','karthi','karthi12','ninja_pizza');

	if(!$conn){
		echo 'Error in connection', mysqli_connect_error();
	}

	$query = 'SELECT * FROM pizzas';			
	$query_st = mysqli_query($conn,$query);
	$query_res = mysqli_fetch_all($query_st, MYSQLI_ASSOC);
	print_r($query_res);

	mysqli_free_result($query_st);
	mysqli_close($conn);
	
?>

<!DOCTYPE html>
<html>

	
	<?php include('templates/header.php'); ?>

	<?php include('templates/footer.php'); ?>

</html>