<?php 

	$conn = mysqli_connect('localhost','karthi','karthi12','ninja_pizza');

	if(!$conn){
		echo 'Error in connection', mysqli_connect_error();
	}

	$query = 'SELECT * FROM pizzas';			
	$query_st = mysqli_query($conn,$query);
	$query_res = mysqli_fetch_all($query_st, MYSQLI_ASSOC);

	mysqli_free_result($query_st);
	mysqli_close($conn);
	
?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<h4 class="center grey-text">Pizzas!</h4>

	<div class="container">
		<div class="row">

			<?php foreach($query_res as $pizza){ ?>

				<div class="col s6 md3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
							<div><?php echo htmlspecialchars($pizza['ingrediants']); ?></div>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href="#">more info</a>
						</div>
					</div>
				</div>

			<?php } ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>