<?php


require 'config/db_connect.php';
if (isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $query = "SELECT * FROM pizzas WHERE id =$id";
    $query_res = mysqli_query($conn, $query);
    $res_con = mysqli_fetch_assoc($query_res);    

    mysqli_free_result($query_res);
    mysqli_close($conn);
}


?>


<html>
<head>
    <title>Ninja Pizza</title>
    <?php require 'Templates/header.php';?>
</head>
<body>

<div class="container center">

<?php $pizza=$res_con ?>
<?php if($pizza): ?>
			<h4><?php echo $pizza['title']; ?></h4>
			<p>Created by <?php echo $pizza['email']; ?></p>
			<p><?php echo date($pizza['created_at']); ?></p>
			<h5>Ingredients:</h5>
			<p><?php echo $pizza['ingrediants']; ?></p>
		<?php else: ?>
			<h5>No such pizza exists.</h5>
		<?php endif ?>


</div>



<?php require 'Templates/footer.php'; ?>
</body>


</html>