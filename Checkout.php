<?php 
// require_once("technoConfig.php"); 
require_once('private/config.php');
require_once('includes/header.php');

$pid=$_GET['pid'];
$From = $_GET['From'];
$imageURLs = $_GET['image'];

$sql="SELECT count(*) from projects WHERE pid=:pid"; 
$stmt = $db->prepare($sql);
$stmt->bindParam(':pid', $pid, PDO::PARAM_INT);
$stmt->execute();
$count=$stmt->fetchcolumn();
if($count==0) 
{
header('location:index.php');
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Paypal Checkout</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-sm-12 form-container">
				<h1>Paypal Checkout</h1>
<hr>
<?php 
  if(isset($_POST['submit_form']))
  {
    $_SESSION['fname']=$_POST['fname']; 
    $_SESSION['lname']=$_POST['lname']; 
    $_SESSION['emailPay']=$_POST['emailPay']; 
    $_SESSION['mobile']=$_POST['mobile']; 
    $_SESSION['note']=$_POST['note']; 
    $_SESSION['address']=$_POST['address']; 
    $_SESSION['pid']=$pid;
  if(isset($_POST['emailPay']) && $_POST['emailPay'] != '' && $From != 0) {
      //make the paypal payment
    }
  }
?>		
				<div class="row">
          <div class="col-6 text-center">
					<?php 
					 $sql="SELECT * from projects WHERE pid=:pid"; 
           $stmt = $db->prepare($sql);
           $stmt->bindParam(':pid',$pid,PDO::PARAM_INT);
           $stmt->execute();
           $row=$stmt->fetch();
           echo '<div class="card">
           <div class="card-body">
           <image src='.$imageURLs.' width="100%" height="200" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></image>
           </div>
           </div> 
           <hr/>
           <h4 class="card-title">Full source code and instructions for - '.$From.' Rs. only </h4>
           <h5>(if you are outside india, please message me on whatsapp to purchase.)</h5>
           <hr>
           <ul type="none" style="text-align:left">
           <h5>How does it work?</h5>
           <li><i class="ion-android-checkmark-circle"></i> Fill up the form on the right, make the payment</li>
           <li><i class="ion-android-checkmark-circle"></i> You will get email</li>
           <li><i class="ion-android-checkmark-circle"></i> Free support if you face any problem</li>
           </ul>';
				?> 
				<br>
	</form>
				</div>
					<div class="col-6"> 
<form action="" method="POST">
  <div class="mb-3">
    <label  class="label">First Name</label>
    <input type="text" class="form-control" name="fname" required>
  </div>
  <div class="mb-3">
    <label class="label">Last Name</label>
    <input type="text" class="form-control" name="lname" required>
  </div>

  <div class="mb-3">
    <label class="label">Email </label>
    <input type="emailPay" class="form-control" name="emailPay" required>
  </div>
  <div class="mb-3">
    <label class="label">Mobile</label>
    <input type="number" class="form-control" name="mobile" required>
  </div>
  <div class="mb-3">
    <label class="label">Address</label>
   <textarea name="address" class="form-control" name="address" required></textarea>
  </div>
  <div class="mb-3">
    <label class="label">Note</label>
   <textarea name="note" class="form-control" name="note"></textarea>
</div>
<button type="submit" class="btn btn-primary" name="submit_form">Place Order With Paypal</button>
					</div>
				</div>
		</div>
	</div>
</div>
</body>
</html>