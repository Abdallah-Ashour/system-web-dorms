<?php
include_once "DbConnection.class.php";
include_once "RoomFunction.class.php";
class TransInnerDorrmTripleRoom{

use DbConnection;
use RoomFunction;
//properties
private $transInnerDorrmTripleRoomId;
private $master_domitory_id;
private $transInnerDorrmTripleRoomTitle;
private $transInnerDorrmTripleRoomBrief;
private $transInnerDorrmTripleRoomImage;
private $transInnerDorrmTripleRoomPrice;
private $isActive;

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
    $sql = "DELETE FROM transinnerdorrmtripleroom WHERE transInnerDorrmTripleRoomId = $delet_id";
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
    
    $sql = "UPDATE transinnerdorrmtripleroom 
            SET isActive = $aValue
            WHERE transInnerDorrmTripleRoomId = '$id'";
    
    if(mysqli_query($this->conn, $sql)){

    }else{
        echo mysqli_error($this->conn);
    }
    
    
}// End of Active Records

// Select data by Id
public function SelectById($id){
    $id = self::test_input($id);
    $sql = "SELECT * FROM transinnerdorrmtripleroom WHERE transInnerDorrmTripleRoomId = '$id'";
    $result = mysqli_query($this->conn, $sql);
    return mysqli_fetch_assoc($result);
}


// select name of the dorms 
public function SelectNameOfDormById($id){
    $id = self::test_input($id);
    $sql = "SELECT 	master_domitory_name FROM masterdormitory WHERE master_domitory_id = '$id'";
    $result = mysqli_query($this->conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['master_domitory_name'];
}

// select room data
public function SelectRoomData($tableName){
    $tableName = self::test_input($tableName);
        
        $sql = "SELECT m.master_domitory_name, m.master_domitory_id, transInnerDorrmTripleRoomId, transInnerDorrmTripleRoomTitle,
                transInnerDorrmTripleRoomBrief, transInnerDorrmTripleRoomImage, transInnerDorrmTripleRoomPrice 
                FROM $tableName t LEFT JOIN masterdormitory  m
                ON t.master_domitory_id = m.master_domitory_id ORDER BY m.master_domitory_id";

        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
               $data[] = $row;
            }// end while
        } // end if
        else{
            echo "else: " . mysqli_error($this->conn);

        } // end else
        return $data;
}
public function getActive($id){
    $id = self::test_input($id);
    $sql = "SELECT 	isActive FROM transinnerdorrmtripleroom WHERE transInnerDorrmTripleRoomId = '$id'";
    $result = mysqli_query($this->conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['isActive'];
}


 // update inner triple room
 public function UpdateInnerTripleRoom($post, $_files){
    $id = self::test_input($post['id']);
    $master_domitory_id = self::test_input($post['id_dorm']);
    $title = self::test_input($post['title']);
    $brief = self::test_input($post['brief']);
    $image = self::moveImageToAnOtherFolder($_files, "image_inner", $post['image_exit']);

    $price = self::test_input($post['price']);
    
    $isActive = self::test_input($post['isActive']);
    

             // update statement
    $sql = "UPDATE transinnerdorrmtripleroom 
            SET master_domitory_id = $master_domitory_id, transInnerDorrmTripleRoomTitle='$title', 
            transInnerDorrmTripleRoomBrief='$brief',
            transInnerDorrmTripleRoomImage = '$image', 
            transInnerDorrmTripleRoomPrice = $price,
            isActive = $isActive
            WHERE transInnerDorrmTripleRoomId ='$id'";

     $result = mysqli_query($this->conn, $sql);
     
     if($result)
        header("location: TransInnerDorrmTripleRoom.php?sm=Update Record Successfully");
      else
      header("location: TransInnerDorrmTripleRoom.php?sm=".mysqli_errno($this->conn));     
     
}




// insert dorms
public function insertTripleRoom($post, $_files){
    $master_domitory_id = self::test_input($post['id_dorm']);
    $title = self::test_input($post['title']);
    $brief = self::test_input($post['brief']);

    $image = self::moveImageToAnOtherFolderToInsert($_files, "image_inner");

    $price = self::test_input($post['price']);
    $isActive = self::test_input($post['isActive']);
    

   // insert statement
    $sql = "INSERT INTO transinnerdorrmtripleroom 
            (master_domitory_id, transInnerDorrmTripleRoomTitle, transInnerDorrmTripleRoomBrief, transInnerDorrmTripleRoomImage,
            transInnerDorrmTripleRoomPrice, isActive)
            VALUES('$master_domitory_id', '$title', '$brief', '$image', $price, $isActive)";
            

     $result = mysqli_query($this->conn, $sql);
     
     if($result)
        header("location: TransInnerDorrmTripleRoom.php?sm=Insert Record Successfully");
      else
      header("location: TransInnerDorrmTripleRoom.php?sm=".mysqli_error($this->conn));
      
     
}

// select data of Triple room
public function selectTripleRoom($id){
    $data = array();

    $sql = "SELECT 	* FROM transinnerdorrmtripleroom WHERE master_domitory_id = '$id'";
    $result = mysqli_query($this->conn, $sql);

    
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row; 
    }
    return $data;
    
}

// select data of  room inernational
public function selectTripleInternationalRoom($id){
    $data = array();

    $sql = "SELECT 	* FROM transinternationaldormtripleroom WHERE master_domitory_id = '$id'";
    $result = mysqli_query($this->conn, $sql);

    
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row; 
    }
    return $data;
    
}

// update the status of room 
public function updateStatus($post){


    $id_std1 = self::test_input($post['id1']);
    $id_std2 = self::test_input($post['id2']);
    $id_std3 = self::test_input($post['id_student']);
    $id_room = self::test_input($post['id_room']);

    $sqls = "SELECT university_ID 
             FROM student_info
             WHERE university_ID = '$id_std1'";
    $results = mysqli_query($this->conn, $sqls);

    if(mysqli_num_rows($results) > 0){

    //update statement for table student
    $sql1 = "UPDATE student_info
             SET transInnerDorrmTripleRoomId = '$id_room', transInnerDorrmNightId = 0, 
             transInnerDorrmDoubleRoomId = 0, transInternationalDormDoubleRoomId = 0,
             transInternationalDormDoubleRoomSisterId = 0, transInternationalDormNightRoomId = 0,
             transInternationalDormSingleRoomId = 0, transInternationalDormTripleRoomId =0
             WHERE university_ID in('$id_std1', '$id_std2', '$id_std3')";
    $result1 = mysqli_query($this->conn, $sql1);
  
    // update statement for table room 
     $sql2 = "UPDATE transinnerdorrmtripleroom
         SET isBooked = 1
         WHERE transInnerDorrmTripleRoomId = '$id_room'";
     
     $result2 = mysqli_query($this->conn, $sql2);
 
     if($result1 && $result2){
       echo '<script>alert("The room has been booked")</script>';
     }
    }else{
        echo '<script>alert("The ID number is Wrong")</script>';
    }
 
 
 
 }
 



}// End of Class



