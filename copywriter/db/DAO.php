<?php
require_once 'config/db.php';

class DAO {

 private $db;

   private $GETALLMEMBERS="SELECT * FROM  copywriters";
   private $INSERTMEMBER="INSERT INTO copywriters(name,surname,price,position,description,image)VALUES(?,?,?,?,?,?)";
   private $GETMEMBERBYID="SELECT * FROM copywriters WHERE id=?";
   private $LOGIN ="SELECT * FROM users WHERE username = ? AND password = ?";
   private $SENDCOMMENT = "INSERT INTO comments(copywriter_id,subject,message,approve) VALUES(?,?,?,?)";
   private $GETALLCOMMENTS="SELECT * FROM  comments WHERE approve=0";
   private $DELETEMEMBER="DELETE FROM  copywriters WHERE id=?";
   private $UPDATEMEMBER="UPDATE copywriters SET name=?, surname=?, price=?, position=?, description=?, image=? WHERE id=?";
   private $UPDATECOMMENT="UPDATE comments SET approve=? WHERE copywriter_id=?";
   private $GETCOMMENTSBYID="SELECT * FROM  comments WHERE copywriter_id=? AND approve=1";

    public function __construct(){
        $this->db=DB::createInstance();
    }


    public function getAllMembers(){
  
        $statement=$this->db->prepare($this->GETALLMEMBERS);
        $statement->execute();
        $result= $statement->fetchAll();
        return $result;
    }
	
	 public function getMemberById($id){
        $statement=$this->db->prepare($this->GETMEMBERBYID);
        $statement->bindValue(1,$id);
        $statement->execute();
        $result= $statement->fetch();  // TREBA DA PRONADJE SAMO JEDNOG CLANA  JER JE ID JEDINSTVEN U BAZI PODATAKA
        return $result;   
    }
	
	public function login($username,$password){
        $statement=$this->db->prepare($this->LOGIN);
        $statement->bindValue(1,$username);
        $statement->bindValue(2,$password);
        $statement->execute();
        $result=$statement->fetch();
        return $result;
    }

    public function sendComment($copywriter_id,$subject,$comment,$approve){
        $statement = $this->db->prepare($this->SENDCOMMENT);
        $statement->bindValue(1,$copywriter_id);
        $statement->bindValue(2,$subject);
        $statement->bindValue(3,$comment);
        $statement->bindValue(4,$approve);
        $statement->execute();    
    }
   
    public function getAllComments(){
        $statement=$this->db->prepare($this->GETALLCOMMENTS);
        $statement->execute();
        $result= $statement->fetchAll();
        return $result;
    }
  
    public function getCommentsById($id){
        $statement=$this->db->prepare($this->GETCOMMENTSBYID);
        $statement->bindValue(1,$id);
        $statement->execute();
        $result= $statement->fetchAll();
        return $result;
    }

    public function deleteMember($id){
        $statement=$this->db->prepare($this->DELETEMEMBER);
        $statement->bindValue(1,$id);
        $statement->execute();   
    }
    
    public function insertMember($name,$surname,$price,$position,$description,$image) {
        $statement = $this->db->prepare($this->INSERTMEMBER);
        $statement->bindValue(1,$name);
        $statement->bindValue(2,$surname);
        $statement->bindValue(3,$price);
        $statement->bindValue(4,$position);
        $statement->bindValue(5,$description);
        $statement->bindValue(6,$image);
        $statement->execute(); 
    } 
    
    public function updateMember($name, $surname, $price, $position, $description,$image,$id){
        $statement = $this->db->prepare($this->UPDATEMEMBER);
        $statement->bindValue(1,$name);
        $statement->bindValue(2,$surname);
        $statement->bindValue(3,$price);
        $statement->bindValue(4,$position);
        $statement->bindValue(5,$description);
        $statement->bindValue(6,$image);
        $statement->bindValue(7,$id);
        $statement->execute();
    }

    public function updateComment($approve,$id){
        $statement = $this->db->prepare($this->UPDATECOMMENT);
        $statement->bindValue(1,$approve);
        $statement->bindValue(2,$id);
        $statement->execute();
    }

} //kraj dao klase-----

?>