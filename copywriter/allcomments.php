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
session_start();

 if(isset($_SESSION['loggedin'])){  
    require_once 'db/DAO.php';
    $dao = new DAO();
    $comments = $dao->getAllComments(); // postoji i resenje da se izbegne pozivanje metode direktno na strani ako bi to bilo potrebno
    
?>
<h3>Administrator: <?php echo  $_SESSION['loggedin']['name']; ?></h3>

<br><br>
<a href="routes.php?page=logout" class="btn btn-danger">Log out</a>
<br><br>
<a href="routes.php?page=/" class="btn btn-warning">BACK</a>
<h3>All unread comments</h3>

<table border="3">
<tr>
<th>Subject</th>
<th>Message</th>
<th>Approve</th>
<th>
</tr>
<?php
foreach ($comments as $c) {
?>
<tr>
<td><?php echo $c['subject']; ?></td>
<td><?php echo $c['message']; ?></td>
<td><a href="routes.php?page=approvecomment&id=<?php echo $c['copywriter_id']; ?>">Approve</a></td>
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