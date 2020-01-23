<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/team.css">
</head>
<body style="margin-left:20px;">
<?php
//session_start();

 if(isset($_SESSION['loggedin'])){

    $dao = new DAO();
    $members = $dao->getAllMembers();
?>
<h3>Administrator: <?php echo  $_SESSION['loggedin']['name']; ?></h3>


<br><br>
<a href="insertmember.php"  class="btn btn-info">Insert new member</a><br><br>
<a href="allcomments.php"  class="btn btn-info">All comments</a><br><br>
<a href="routes.php?page=logout" class="btn btn-danger">Log out</a>

<h3>All members</h3>
<?php
$msg=isset($msg)?$msg:"";

echo "<span style='color:blue; font-size:30px; font-weight:bold; text-align:center;'> $msg</span>";
?>
<table border="3">
<tr>
<th>Name</th>
<th>Surname</th>
<th>Price</th>
<th>Position</th>
<th>Description</th>
<th colspan="2">Action</th>

</tr>
<?php
foreach ($members as $m) {
?>
<tr>
<td><?php echo $m['name']; ?></td>
<td><?php echo $m['surname']; ?></td>
<td><?php echo $m['price']; ?></td>
<td><?php echo $m['position']; ?></td>
<td><?php echo $m['description']; ?></td>

<td><a href="routes.php?page=edit&id=<?php echo $m['id']; ?>" class="btn btn-warning">Edit</a></td>
<td><a href="routes.php?page=delete&id=<?php echo $m['id']; ?>" class="btn btn-danger">Delete</a></td>

</tr>

<?php
}
?>
</table>

<?php
 }else{
     header("Location:login.php");
 }
?>
</body>
</html>