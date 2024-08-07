<?php
    include('template/config.php');
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


    // spliting the ingredients in to a list
    
    
?>

<!DOCTYPE html>
<html>
 <?php include('template/header.php') ?>
    <h4 class='center grey-text'>Muffins!</h4>
    <div class='row'>
        <?php foreach ($muffins as $muffin): ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                     <img src="image/muffin1.jpg" class="muffin">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($muffin['title']); ?></h6>
                        <ul>
                            <?php foreach(explode(',', $muffin['ingredients']) as $ingrid): ?>
                                <li><?php echo htmlspecialchars($ingrid); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a class="band-text" href="<?php echo BASE_URL; ?>/template/details.php?id=<?php echo $muffin['id']; ?>">More info</a>
                    </div>

                </div>
            </div>
            
        <?php endforeach; ?>


    </div>


 <?php include('template/footer.php') ?>
	

</html>