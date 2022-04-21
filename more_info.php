<?php


require 'config/db_connect.php';

if(isset($_POST['delete'])){
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $sql = "DELETE FROM pizzas WHERE id=$id";
    $sql_result = mysqli_query($conn, $sql);
    header('Location: index.php');
}



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

<div class="container center grey-text">


<?php if($res_con): ?>
			<h4><?php echo htmlspecialchars($res_con['title']); ?></h4>
			<p>Created by <?php echo htmlspecialchars($res_con['email']); ?></p>
			<p><?php echo htmlspecialchars(date($res_con['created_at'])); ?></p>
			<h5>Ingredients:</h5>
			<p><?php echo $res_con['ingrediants']; ?></p>

            <form action="more_info.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $res_con['id']; ?>">      
                <input type="submit" name="delete" value="delete" class="btn brand z-depth-0"> 
            </form>
		<?php else: ?>
			<h5>No such pizza exists.</h5>
            
		<?php endif ?>


</div>



<?php require 'Templates/footer.php'; ?>
</body>


</html>