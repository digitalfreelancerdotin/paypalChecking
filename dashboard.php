<?php 
include_once ('includes/header.php');
include_once ('private/config.php');

if(isset($_SESSION['isLoggedIn'])){
}else{
    header("Location: adminLogin.php");
}

if(isset($_POST['imageLink'])){
    $imageLink = $_POST['imageLink'];
    // Prepare the INSERT statement using placeholders
    $stmtImageLink = $db->prepare("UPDATE indexpage SET imageLink = :imageLink WHERE sln = 1");
    // $stmtImageLink = $db->prepare("INSERT INTO indexpage (imageLink) VALUES (:imageLink) WHERE sln=1");
    // Bind the actual values to the placeholders
    $stmtImageLink->bindParam(':imageLink', $imageLink);
    // Execute the statement
    if ($stmtImageLink->execute()) {
        header("Location: dashboard.php");
        // echo "saved successfully";
        exit();
    }
}
?>

<!--==========================
      About Us Section
============================-->
    
    <div class="container min-vh-100 mt-auto pb-5">
        <hr>
    <?php
                
    $myQuery = "SELECT imageLink, heroText, heroDescription, title, buttonName FROM indexpage LIMIT 1";
    $indexstmt = $db->query($myQuery);
    $indexstmt->execute();

    $myQuery = "SELECT showSocialMediaBar,twitterLink,facebookLink,linkedInLink,instagramLink FROM indexpage LIMIT 1";
    $stmt = $db->prepare($myQuery);
    $stmt->execute();
    
    ?>

    <div class="row justify-content-end">
    <form action="logout.php" method="POST">
        <button class="btn btn-primary" type="submit">Logout</button>
    </form>
    </div>




<h2><span> Assets</span> </h2>
<?php
$sqlProjects = "SELECT title, summary, description1, imagePath, price FROM projects";
$projectstmt = $db->query($sqlProjects);
$projectstmt->execute();
?>

<!-- Display the data in an HTML table -->
<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Summary</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image URL</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($rowpj = $projectstmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $rowpj['title']; ?></td>
                <td><?php echo $rowpj['summary']; ?></td>
                <td><?php echo substr($rowpj['description1'], 0, 100) . "..."; ?></td>
                <td><?php echo $rowpj['price']; ?></td>
                <td><a href="<?php echo $rowpj['imageUrl']; ?>" target="_blank">Image URL</a></td>
                
            </tr>
        <?php } ?>
        <tr>
        <hr>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <form method="post">
          <input type="hidden" name="action" value="add">
          <div class="mb-3">
            <label for="title" class="form-label"><b>Title:</b></label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
          <div class="mb-3">
            <label for="summary" class="form-label"><b>Summary:</b></label>
            <input type="text" class="form-control" id="summary" name="summary" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label"><b>Description:</b> <a href="https://onlinehtmleditor.dev" target="_new">(Use online HTML editor)</a></label>
            <textarea class="form-control" id="description" name="description" style="height: 200px;" required></textarea>
          </div>
          <div class="mb-3">
            <label for="price" class="form-label"><b>Price:</b></label>
            <div class="input-group">
              <span class="input-group-text">Rs.</span>
              <input type="text" class="form-control" id="price" name="price" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="image_url" class="form-label"><b>Image URL:</b></label>
            <input type="text" class="form-control" id="image_url" name="image_url" required>
          </div>
          
          <button type="submit" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>
        </tr>
    </tbody>
</table>

<hr>

<h2><span>Personal details</span> </h2>
<?php

    $sqlPersonal = "SELECT firstName, lastName, city, timezone,contactEmail,contactPhone,contactAddress FROM personaldetails LIMIT 1";
    $stmtpersonal = $db->query($sqlPersonal);
?>
<!-- Display the data in an HTML table -->

<hr>
<h2><span> Order history</span> </h2>
<?php
// Fetch data from the 'projects' table
$sqlPayments = "SELECT firstname, lastname, payer_email,amount, payment_date, status FROM payments";
$stmntPayments = $db->query($sqlPayments);

?>

<!-- Display the data in an HTML table -->
<table class="table">
  <thead>
    <tr>
      <th>Name</th>
      <th>payer_email</th>
      <th>amount</th>
      <th>payment_date</th>
      <th>status</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($rowP = $stmntPayments->fetch(PDO::FETCH_ASSOC)) { ?>
      <tr>
        <td><?php echo $rowP['firstname']." ".$rowP['lastname']; ?></td>
        <td><?php echo $rowP['payer_email']; ?></td>
        <td><?php echo $rowP['amount']; ?></td>
        <td><?php echo $rowP['payment_date']; ?></td>
        <td><?php echo $rowP['status']; ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
						
<hr>

<?php
// Check if form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Prepare SQL statement with placeholders
    $stmt = $db->prepare("INSERT INTO blogs (title, content, author, date_published) VALUES (:title, :content, :author, NOW())");

    // Bind values to placeholders
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':author', $author);

    // Set variables from form input
    $title = $_POST["title"];
    $content = $_POST["content"];
    $author = $_POST["author"];

    // Execute SQL statement
    $stmt->execute();

    // Redirect user to homepage or show success message
    header("Location: index.php");
    exit();
}

?>


</div>
<hr>
<script>
function calculateURL(){
    const url = document.getElementById("imageLink").value;
    const urlObj = new URL(url);
    const id = urlObj.pathname.split('/')[3];
    const newUrl = `https://drive.google.com/uc?export=view&id=${id}`;
    document.getElementById("imageLink").value = newUrl;
}
</script>

<?php
include_once 'includes/footer.php';
?>