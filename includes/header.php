<?php
include_once ("private/config.php");

$sql = "SELECT * FROM indexpage LIMIT 1";
$stmt = $db->query($sql);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $_SESSION['title']=$row['title'];
}
?>
<?php
echo '<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="stylesheet" href="styles.css">
        <title>'.$_SESSION['title'].'</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" integrity="sha512-nnJwztFp24ezGgHx6/5GMIupDzXuJghVJ+1JpIR7VVKwJcLm+2CO/pfvDRukfo/X/M+Cz9GRtYDQyKSLJtO8/A==" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-cXlA1cygKZeRoIwzFmOOszxk4v2Cm4WzoDdIyX9BDy70jK8fYmDz3qom1CExv5+5L5fl27Q2/TlvRNNgRv1O7g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <style>
        .card img {
          height: 280px;
        }
      </style>
    </head>
    <body class="d-flex flex-column min-vh-100 h-100">
    <main class="flex-shrink-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="index.php">'.$_SESSION['title'].'</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>';