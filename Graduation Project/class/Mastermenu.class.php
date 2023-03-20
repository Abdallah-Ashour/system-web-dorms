<?php


include_once "DbConnection.class.php";

class Mastermenu{
    // trait
    use DbConnection;

    // properties   
    private $master_menu_id;
    private $master_menu_name;
    private $master_menu_url_link;
    private $isActive;
    private $isDelete;


    //methods
    public function __construct(){
        $this->conn = self::connection();
    }
    public function __destructor(){
        mysqli_close($this->conn);
    }

    public function setActive($pageTitle = null, $id){
        $result = mysqli_query($this->conn, "SELECT master_menu_id FROM mastermenu Where master_menu_name = '$pageTitle'");
        $row = mysqli_fetch_assoc($result);
          if($row["master_menu_id"] == $id && isset($row["master_menu_id"])){
            echo "active";
          }
    }// End Function Set Active navbar

   
    
    
    // delete Records 
    public function deleteRecords($delet_id){
        $delet_id = self::test_input($delet_id);
        $sql = "DELETE FROM mastermenu WHERE master_menu_id = $delet_id";
        mysqli_query($this->conn, $sql);
    }
    // Active Records
    public function isActive($id, $isActive){
        $id = self::test_input($id);
        $isActive = self::test_input($isActive);
        if($isActive == 0)
            $aValue = 1;
         else   
          $aValue = 0;
        
        $sql = "UPDATE mastermenu 
                SET isActive = $aValue
                WHERE master_menu_id = '$id'";
        
        mysqli_query($this->conn, $sql);
        
    }// End of Active Records

    // Select data by Id
    public function SelectById($id){
        $id = self::test_input($id);
        $sql = "SELECT * FROM mastermenu WHERE master_menu_id = '$id'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }


    // update navbar
    public function UpdateNav($post){
        $id = self::test_input($post['id']);
        $name = self::test_input($post['name']);
        $link = self::test_input($post['link']);
        $isActive = self::test_input($post['isActive']);

        $sql = "UPDATE mastermenu 
                SET master_menu_name='$name', master_menu_url_link='$link',
                isActive = $isActive
                WHERE master_menu_id='$id'";

         $result = mysqli_query($this->conn, $sql);
         
         if($result)
            header("location: navbar-footer.php?sm=Update Record Successfully");
 
         
    }// End Update

    // Insert Menu
    public function insertMenu($post){
    $name = self::test_input($post['name']);
    $isInternational = self::test_input($post['isInternational']);
    $link = self::test_input($post['link']);

    $isActive = self::test_input($post['isActive']);
    

   // insert statement
    $sql = "INSERT INTO mastermenu (master_menu_name, master_menu_dropmenu, master_menu_url_link,
            isActive, isDelete) 
            VALUES('$name', $isInternational, '$link', $isActive, 0)";
            

     $result = mysqli_query($this->conn, $sql);
     
     if($result)
        header("location: navbar-footer.php?sm=Insert Record Successfully");
      else
      header("location: navbar-add-form.php?sm=".mysqli_errno($this->conn));
      
     
}//end insert function
   



    

         
} //End class

$m = new Mastermenu();
// $m->isActive(6, 1);
// $m->setActive("Home");
/*
$data = $m->selectData("mastermenu");

echo "<br>";
echo "<pre>";
print_r($data);
echo "</pre>";
*/


?>