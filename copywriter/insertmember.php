<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/team.css">
</head>
<body style="margin-left:650px;">
<?php
session_start();

 if(isset($_SESSION['loggedin'])){
?>
<h3>Administrator: <?php echo  $_SESSION['loggedin']['name']; ?></h3>


<br><br>
<a href="allcomments.php">All comments</a><br><br>
<a href="routes.php?page=logout">Log out</a>

<h3>New member</h3>
<form action="routes.php" method="POST" enctype="multipart/form-data">
      <input type="text"   name="name" placeholder="name"><br><br>
      <input type="text"   name="surname" placeholder="surname"><br><br>
      <input type="text"   name="price" placeholder="price per hour"><br><br>
      <input type="text"   name="position" placeholder="position"><br><br>
      <textarea name="description" cols="30" rows="10"></textarea><br><br>
      <input type="file" name="image" /><br><br>

      <input type="submit"   name="page" value="Add">
    </form>


    <?php
$msg=isset($msg)?$msg:"";

echo "<span style='color:blue; font-size:20px;'> $msg</span>";
?>

<?php
 }else{
     header("Location:login.php");
 }
?>
</body>
</html>