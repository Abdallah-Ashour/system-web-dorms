<?php
include_once "DbConnection.class.php";

class Masterdormitory{

use DbConnection;

//properties
private $master_domitory_id;
private $master_domitory_name;
private $master_domitory_brief;
private $isActive;
private $isDelete;

//methods
public function __construct(){
    $this->conn = self::connection();
}
public function __destructor(){
    mysqli_close($this->conn);
}

// delete Records 
public function deleteRecords($delet_id){
    $delet_id = self::test_input($delet_id);
    $sql = "DELETE FROM masterdormitory WHERE master_domitory_id = $delet_id";
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
    
    $sql = "UPDATE masterdormitory 
            SET isActive = $aValue
            WHERE master_domitory_id = '$id'";
    
    mysqli_query($this->conn, $sql);
    
}// End of Active Records

// Select data by Id
public function SelectById($id){
    $id = self::test_input($id);
    $sql = "SELECT * FROM masterdormitory WHERE master_domitory_id = '$id'";
    $result = mysqli_query($this->conn, $sql);
    return mysqli_fetch_assoc($result);
}



 // update dorms
 public function UpdateDorm($post, $_files){
    $id = self::test_input($post['id']);
    $name = self::test_input($post['name']);
    $brief = self::test_input($post['brief']);

    $linkDorm = self::test_input($post['linkDorm']);
    $linkMap = self::test_input($post['linkMap']);

    $isInternational = self::test_input($post['isInternational']);

    $image = self::moveImageToAnOtherFolder($_files, "image_dorm", $post['image_exit']);

    $isActive =  self::test_input($post['isActive']);
    

          // update statement
    $sql = "UPDATE masterdormitory 
            SET master_domitory_name='$name', master_domitory_brief='$brief',
            master_domitory_link_url = '$linkDorm', master_domitory_link_map = '$linkMap',
            isInternational = $isInternational,
            master_domitory_image = '$image', 
            isActive = $isActive
            WHERE master_domitory_id ='$id'";

     $result = mysqli_query($this->conn, $sql);
     
     if($result)
        header("location: Dorms.php?sm=Update Record Successfully");
      else
      header("location: Dorms.php?sm=".mysqli_errno($this->conn));     
     
}

// insert dorms
public function insertDorm($post, $_files){

    $name = self::test_input($post['name']);
    $brief = self::test_input($post['brief']);

    $linkDorm = self::test_input($post['linkDorm']);
    $linkMap = self::test_input($post['linkMap']);

    $isInternational = self::test_input($post['isInternational']);
    $image = self::moveImageToAnOtherFolderToInsert($_files, "image_dorm");
    $isActive = self::test_input($post['isActive']);
    

   // insert statement
    $sql = "INSERT INTO masterdormitory 
            (master_domitory_name, master_domitory_brief, master_domitory_link_url,
            master_domitory_link_map, isInternational, master_domitory_image, isActive, isDelete)
            VALUES('$name', '$brief', '$linkDorm', '$linkMap', $isInternational, '$image', $isActive, 0)";
            

     $result = mysqli_query($this->conn, $sql);
     
     if($result)
        header("location: Dorms.php?sm=Insert Record Successfully");
      else
      header("location: Dorms.php?sm=".mysqli_errno($this->conn));
      
     
}
// select The link of dorms 


public function selectNameIdOfDorm($id){
    $sql = "SELECT master_domitory_id, master_domitory_name
            FROM masterdormitory
            WHERE master_domitory_id = $id";
    $result = mysqli_query($this->conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }     
    return $data;
}


} // End class

?>