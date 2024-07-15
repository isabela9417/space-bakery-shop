<?php

	include('config.php');

	// check GET request id
	if(isset($_GET['id'])){
		$id = mysqli_real_escape_string($conn, $_GET['id']);
		// make sql query
		$sql = "SELECT * FROM muffins WHERE id = $id";

		// get the query results
		$result = mysqli_query($conn, $sql);

		//Fetch the result in an array format
		$muffin = mysqli_fetch_assoc($result);

		//free the memory and close the connection
		mysqli_free_result($result);
		mysqli_close($conn);
	}

?>

<!DOCTYPE html>
<html>
	<?php include('header.php') ?>
	 <div class="container center">
	 	<?php if($muffin): ?>
	 		<h4><?php echo htmlspecialchars($muffin['title']); ?></h4>
	 		<p>created by: <?php echo htmlspecialchars($muffin['email']); ?></p>
	 		<p><?php echo date($muffin['created_at']); ?></p>
	 		<h5>Ingredients: </h5>
	 		<p><?php echo htmlspecialchars($muffin['ingredients']); ?></p>

	 	<?php else: ?>
	 		<h5>There's no such muffin in store!! </h5>
	 	<?php endif; ?>
	 </div>

	<?php include('footer.php') ?>

</html>