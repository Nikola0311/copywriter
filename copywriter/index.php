<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/team.css">
</head>
<body>
<header class="header--type2" data-background="images/team.jpg" data-height="35%" style="background-image: url(images/team.jpg); min-height: 301.35px; -webkit-user-select: auto;">
   <div class="inner" style="-webkit-user-select: auto;">
      <div class="container" style="-webkit-user-select: auto;">
         <div class="row" style="-webkit-user-select: auto;">
            <div class="col-md-10" style="-webkit-user-select: auto;">
               <section class="ct-page_title" style="-webkit-user-select: auto;">
                  <div class="h1" style="-webkit-user-select: auto;">
                  Our team
                  </div>
                  <div class="ct-page_title-content" style="-webkit-user-select: auto;"></div>
               </section>
            </div>
         </div>
      </div>
   </div>
</header>
<br>
<a href="routes.php?page=show_login" class="btn btn-primary" style="float:right;margin-right:20px;">Log in</a>
<br>
 <?php
            require_once 'db/DAO.php';
            $dao = new DAO();
            $team = $dao->getAllMembers(); // postoji i resenje da se izbegne pozivanje metode direktno na strani ako bi to bilo potrebno
			
   ?>
<div class="container">
   <div id="theBioGrid">
      <ul class="row biogrid" id="biogrid">
	  
	    <?php
          foreach ($team as $t) {
         ?>
         <li class="col-xs-3">
            <div class="imgHolder">
               <a href="routes.php?page=details&id=<?php echo $t['id']; ?>"><img alt="jia" class="img-responsive" src="images/<?php echo $t['image']; ?>"></a>
               <div class="description-box animateBottomName"><?php echo $t['name']." ".$t['surname']; ?><br><br>Price per hour: <?php echo $t['price']." $"; ?><br><?php echo $t['position']; ?></div>
            </div>
         </li>	 
		 <?php
		 }
		 ?>
      
      </ul>
   </div>
   
</div>
</body>
</html>