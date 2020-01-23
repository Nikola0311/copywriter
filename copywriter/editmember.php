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
<a href="allcomments.php"  class="btn btn-info">All comments</a><br><br>
<a href="routes.php?page=logout" class="btn btn-danger">Log out</a> 

<h3>Edit member</h3>

<span style='color:red;'>* All fields are required.</span>
<form action="routes.php" method="POST" enctype="multipart/form-data">
      <input type="text"   name="name" value="<?php echo $member['name'];?>"><br><br>
      <input type="text"   name="surname"value="<?php echo $member['surname'];?>"><br><br>
      <input type="text"   name="price" value="<?php echo $member['price'];?>"><br><br>
      <input type="text"   name="position" value="<?php echo $member['position'];?>"><br><br>
      <textarea name="description" cols="30" rows="10"><?php echo $member['description'];?></textarea><br><br>
      <input type="file" name="image"/><br><br>
      <input type="hidden"   name="id" value="<?php echo $member['id'];?>">

      <input type="submit"   name="page" value="Save changes"  class="btn btn-success">
</form>

<?php
 }else{
     header("Location:login.php");
 }
?>
</body>
</html>