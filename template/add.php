<?php
	include('config.php');
	//setting strings on form to be blank on first display
	$email = $title = $ingredients = '';
	// Error message variable
	$errors = array('email'=> '','title'=>'', 'ingredients'=>'');
	if(isset($_POST['submit']))
	{
		
		//check email
		if(empty($_POST['email'])){
			$errors['email'] = 'An email is required <br/>';
		}
		else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'email must be a valid address';
			}
		}
		//check title
		if(empty($_POST['title'])){
			$errors['title'] = 'A title required <br/>';
		}
		else{

			$title = $_POST['title'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $title)){	
				$errors['title'] = 'Title must be letters and spaces only';
			}
		}
		//check ingredients
		if(empty($_POST['ingredients'])){
			$errors['ingredients'] = 'At least one ingredient is required <br/>';
		}
		else{
			$ingredients = $_POST['ingredients'];
			if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
				$errors['ingredients'] = 'Ingredients should be comma seperated list';
			}
		}  

		// redirecting to a home page

		if(array_filter($errors)){
			//echo 'errors in the form';
		}
		else{
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$title = mysqli_real_escape_string($conn, $_POST['title']);
			$ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
			// create sql
			$sql = "INSERT INTO muffins(title, email, ingredients) VALUES('$title', '$email', '$ingredients')";
			// save to the database
			if(mysqli_query($conn, $sql)){
				//success
				header('Location: ' . BASE_URL . 'index.php');
				exit();
			}else{
				//error
				echo 'query error: ' . mysqli_error($conn);
			}
			
		}
	} // end of POST check
?> 

<!DOCTYPE html>
<html>
 <?php include('header.php'); ?>

 <section class="container grey-text">
 	<h4 class="center">Add A Muffin</h4>
 	<form class="white" action="" method="POST">
 		<label>Your Email:</label>
 		<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
 		<div class="red-text"><?php echo $errors['email']; ?></div>
 		<label>Muffin Title:</label>
 		<input type="text" name="title" value= "<?php echo htmlspecialchars($title) ?>">
 		<div class="red-text"><?php echo $errors['title']; ?></div>
 		<label>Ingredients (comma seperated):</label>
 		<input type="text" name="ingredients" value= "<?php echo htmlspecialchars($ingredients) ?>">
 		<div class="red-text"><?php echo $errors['ingredients']; ?></div>
 		<div class="center">
 			<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
 		</div>
 	</form>
 </section>
 <?php include('footer.php'); ?>
  
 </html>