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

<?php 
//var_dump($member);
     
?>
<div class="container">
<div class="row">
   <div class="col-md-12 blue-box bio-detail">
      <div class="biogrid container">
         <div class="row">
            <div class="col-lg-4 col-md-5 col-sm-6 col-xs-5 bioimage">
               <img alt="member" class="grid-image img-responsive" src="images/<?php echo $member['image']; ?>">
            </div>
            <div class="col-lg-8 col-md-7 col-sm-6 col-xs-7 biodescription">
               <div class="bio-info">
                 
                  <h2><?php echo $member['name']." ".$member['surname']; ?></h2>
                  <p class="bio-subtitle"><strong>Position: <?php echo $member['position']; ?></strong></p>
				  <p class="bio-subtitle"><strong>Price per hour: <?php echo $member['price']." $"; ?></strong></p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="col-max-960">
         <h3>Description</h3>
         <p><?php echo $member['description']; ?></p>

         <h3>Comments</h3>

         <?php
         $dao = new DAO();
         $comments = $dao->getCommentsById($member['id']);
          $i=1;
       foreach($comments as $c){

            echo "<br> <h3 style='color:orange;'>$i.&nbsp;$c[subject]</h3>";
            echo " <h5>$c[message]</h5>";
            $i++;
         }
         ?>
      </div>
   </div>
</div>

<h3>Write comment</h3>
<?php
$msg=isset($msg)?$msg:"";
$msg2=isset($msg2)?$msg2:"";
echo "<span style='color:blue;'> $msg2</span>";
echo "<span style='color:red;'>* $msg</span>";
?>
<form action="routes.php" method="POST">
      <input type="text" id="text"  name="subject" placeholder="subject" size="30"><br><br>
       <textarea name="comment" cols="32" rows="10" placeholder="comment"></textarea><br><br>
       <input type="hidden" id="text"  name="id"  value=<?php echo $member['id'];?>><br><br>

      <input type="submit"  name="page" value="Send">
    </form>






</div>

</body>
</html>