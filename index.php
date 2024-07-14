<?php

    $conn = new mysqli('localhost', 'Isabela94', '+BlackWidow94', 'space_shop');

    //check the DB connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //Getting all the muffins
    $sql = 'SELECT title, ingredients, id FROM muffins ORDER BY created_at';

    //Make the query and get the results
    $result = mysqli_query($conn, $sql);

    //fetching the results as an array
    $muffins = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free the memory where result was stored
    mysqli_free_result($result);
     
    //now we closing the connection
    mysqli_close($conn);
    
?>

<!DOCTYPE html>
<html>
 <?php include('template/header.php') ?>
    <h4 class='center grey-text'>Muffins!</h4>
    <div class='row'>
        <?php foreach ($muffins as $muffin) { ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($muffins['title']) ?></h6>
                        <div><?php echo htmlspecialchars($muffins['ingredients']) ?></div>
                    </div>
                    <div class="card-action right-align">
                        <a class="band-text" href="#">More info</a>
                    </div>
                </div>
            </div>
            
        <?php } ?>

    </div>


 <?php include('template/footer.php') ?>
	

</html>