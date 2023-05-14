<?php include_once("includes/header.php"); ?>

    
    
    <!-- Blog preview section-->
    <section class="py-5">
        <div id="projects" class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center">
                        <h2 class="fw-bolder">products</h2>
                        <p class="lead fw-normal text-muted mb-5">Explore the wide selection of products.</p>
                    </div>
                </div>
            </div>


            
<?php
$sql = "SELECT pid, title, description1, price,summary,imagePath FROM projects";
// execute the query and store the result set
$stmt = $db->query($sql);
// check if there are any rows in the result set
if ($stmt->rowCount() > 0) {
    // loop through each row in the result set
    for ($count = 1; $row = $stmt->fetch(PDO::FETCH_ASSOC); $count++) {
        $pid = $row['pid'];
        $title = $row['title'];
        $summary = $row['summary'];
        $price = $row['price'];
        $imageURL = $row['imagePath'];

        // check if the counter is divisible by 4
        if ($count % 3 == 1) {
            // if so, start a new row
            echo '<div class="row"><hr>';
        }
        // display the column data
        echo '<div class="col sm">';
        echo '<h2><a href="checkout.php?pid='.$pid.'&image='.$imageURL.'&From='.$price.'">' . $title . '</a></h2>';
        
        echo '<img src="' . $imageURL . '" width="300" height="200">';

        echo '<p>' . $summary . '</p>';
        // echo '<h3 class="text-center">Rs. ' . $price . '</h3>';
        echo '<h3>Rs. ' . $price . '</h3>';
        echo '</div>';
        // check if the counter is divisible by 4
        if ($count % 3 == 0 || $count == $stmt->rowCount()) {
            // if so, end the row
            echo '</div>';
        }
    }
}
?>
<hr>


<?php require_once('includes/footer.php'); ?>