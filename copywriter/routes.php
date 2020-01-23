<?php
require_once 'controllers/Controller.php';

$controller= new Controller();

$page=isset($_GET['page'])?$_GET['page']:"";

switch($page){

case '/':
$controller->showAdminDashboard();
break;

case 'details':
$controller->showDetails();
break;

 case 'show_login':
 $controller->showLogin();
 break;

 case 'logout':
 $controller->logout();
 break;

 case 'delete':
 $controller->deleteMember();
 break;
  
 case 'edit':
 $controller->showEditForm();
 break;
 
 case 'approvecomment':
 $controller->approveComment();
 break;
}


// zahtevi koji stizu post metodom
if($_SERVER['REQUEST_METHOD']=='POST'){
    $page=isset($_POST['page'])?$_POST['page']:"";

    switch($page){

      case 'Log in':
      $controller->login();
      break;


      case 'Send':
      $controller->sendComment();
      break;


      case 'Add':
      $controller->addMember();
      break;


      case 'Save changes':
      $controller->editMember();
      break;


    }
}






?>