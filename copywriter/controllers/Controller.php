<?php
require_once 'db/DAO.php';

class Controller{

    public function  showAdminDashboard(){
        session_start();
        include 'admin.php';
    }
    public function showIndex(){
        session_start();
        include 'index.php';
        // header('Location:index.php');
    }
  
public function showDetails(){

       $id=isset($_GET['id'])?$_GET['id']:array();
       if(!empty($id)){
		   $dao = new DAO();
        $member=$dao->getMemberById($id);
        include 'details.php';
       }
}
  
public function showLogin(){
       include 'login.php';
	  }
  
  
public function login(){

     $username=isset($_POST['username'])?$_POST['username']:"";
     $password=isset( $_POST['password'])?$_POST['password']:"";

     if(!empty($username) && !empty($password)){
         $dao= new DAO();
         $user=$dao->login($username,$password);
         if($user){
         session_start();
         $_SESSION['loggedin']=$user;
         include 'admin.php';

         }else{
             $msg= "Incorrect username or password";
             include 'login.php';
         }

     }else{
       $msg= "You must enter username and password";
       include 'login.php';
     }
 }

 public function logout(){
     session_start();
     session_destroy();
     header('Location:index.php');   
 }
  
 public function sendComment(){

    $subject=isset($_POST['subject'])?$_POST['subject']:"";
    $comment=isset( $_POST['comment'])?$_POST['comment']:"";
    $copywriter_id=isset( $_POST['id'])?$_POST['id']:"";

    $approve=0;
     if(!empty($subject) && !empty($comment)){

        $dao= new DAO();
        $dao->sendComment($copywriter_id,$subject,$comment,$approve);
        $member=$dao->getMemberById($copywriter_id);
    
        $msg2= "Thank you, your comment will be visible after approval.";
        include 'details.php';

     }else{
        $dao= new DAO();

        $member=$dao->getMemberById($copywriter_id);
        $msg= "All fields are required.";
        include 'details.php';
     }

 }

 public function deleteMember(){

    $id=isset($_GET['id'])?$_GET['id']:"";
    $dao= new DAO();
    $dao->deleteMember($id);
    session_start();
    $msg="Member is deleted.";
    include 'admin.php';
 }



 public function showEditForm(){
    $id=isset($_GET['id'])?$_GET['id']:"";

    if(!empty($id)){
    $dao= new DAO();
    $member=$dao->getMemberById($id);
    include 'editmember.php'; 

    }else{
        $msg="Error.";
        include 'admin.php'; 
    }

}

public function editMember(){
    $name=isset($_POST['name'])?$_POST['name']:"";
    $surname=isset($_POST['surname'])?$_POST['surname']:"";
    $position=isset($_POST['position'])?$_POST['position']:"";
    $price=isset($_POST['price'])?$_POST['price']:"";
    $description=isset($_POST['description'])?$_POST['description']:"";
    $id=isset($_POST['id'])?$_POST['id']:"";

    if(isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        
        
        if($file_size > 2097152){
           $errors[]='File size must be excately 2 MB';
        }
        
        if(empty($name) or empty($surname) or empty($position) or empty($price) or empty($description)){
            $errors[]='All fields are required';
         }

        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"images/".$file_name);
           $dao= new DAO();
           $dao->updateMember($name, $surname, $price, $position, $description,$file_name,$id);

           session_start();
           $msg="Successful changes";
           include 'admin.php';

        }else{
           print_r($errors);
        }
     }

}

public function addMember(){
    $name=isset($_POST['name'])?$_POST['name']:"";
    $surname=isset($_POST['surname'])?$_POST['surname']:"";
    $position=isset($_POST['position'])?$_POST['position']:"";
    $price=isset($_POST['price'])?$_POST['price']:"";
    $description=isset($_POST['description'])?$_POST['description']:"";

    //deo vezan za proveru slike
    if(isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        
        //opciono
        if($file_size > 2097152){
           $errors[]='File size must be excately 2 MB';
        }
        
        if(empty($name) or empty($surname) or empty($position) or empty($price) or empty($description)){
            $errors[]='All fields are required';
         }

        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"images/".$file_name);
           $dao= new DAO();
           $dao->insertMember($name,$surname,$price,$position,$description,$file_name);
           $msg="Wow we have a new member on the team.";
           include 'insertmember.php';

        }else{
           print_r($errors);
        }
     }

}

public function approveComment(){

    $id=isset($_GET['id'])?$_GET['id']:"";
    $approve=1;
    $dao= new DAO();
    $dao->updateComment($approve,$id);
    $msg="Comment approved ";
    include 'allcomments.php';

}


} 

?>