<?php
include_once('includes/header.php');
require_once('private/config.php');
$email = $password = $pwd = '';
if (isset($_POST['email']) && isset($_POST['password'])) {
  $email = $_POST['email'];
  $pwd = $_POST['password'];
  $password = password_hash($pwd, PASSWORD_DEFAULT);
} else {
  // Handle the case where email and/or password are not set
  echo "<div class='container'>Please enter your email and password</div>";
}
$password = password_hash($pwd, PASSWORD_DEFAULT);
$sql = "SELECT * FROM tbluser WHERE email=:email";
$stmt = $db->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();
if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch();
    $hash = $row['password'];
    if (password_verify($pwd, $hash)) {
        // password is correct, do something here
        $_SESSION['isLoggedIn'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        // password is incorrect, handle the error
        echo "Invalid email or password";
    }
} 
?>

<div class="container">
  <header id="header">
  <section style='padding-top: 50px;justify-content: center;'>
  <div id="frmRegistration">
  <form class="form-horizontal" method="POST" action="">	
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-6">
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-6"> 
        <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
      </div>
    </div>
    <div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="login" class="btn btn-primary">Login</button>
      </div>
    </div>
  </form>
</section>
</header>
</div>
</div>
<?php include_once('includes/footer.php'); ?>