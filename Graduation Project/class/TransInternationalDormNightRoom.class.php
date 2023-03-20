<?php
include_once "DbConnection.class.php";
include_once "RoomFunction.class.php";
class TransInternationalDormNightRoom{

use DbConnection;
use RoomFunction;
//properties
private $transInternationalDormNightRoomId;
private $master_domitory_id;
private $transInternationalDormNightRoomTitle;
private $transInternationalDormNightRoomBrief;
private $transInternationalDormNightRoomImage;
private $transInternationalDormNightRoomPrice;
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
    $sql = "DELETE FROM transinternationaldormNightroom WHERE transInternationalDormNightRoomId = $delet_id";
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
    
    $sql = "UPDATE transinternationaldormNightroom 
            SET isActive = $aValue
            WHERE transInternationalDormNightRoomId = '$id'";
    
    if(mysqli_query($this->conn, $sql)){

    }else{
        echo mysqli_error($this->conn);
    }
    
    
}// End of Active Records

// Select data by Id
public function SelectById($id){
    $id = self::test_input($id);
    $sql = "SELECT * FROM transinternationaldormNightroom WHERE transInternationalDormNightRoomId = '$id'";
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
        
        $sql = "SELECT m.master_domitory_name, m.master_domitory_id, transInternationalDormNightRoomId, transInternationalDormNightRoomTitle,
                transInternationalDormNightRoomBrief, transInternationalDormNightRoomImage, transInternationalDormNightRoomPrice 
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
    $sql = "SELECT 	isActive FROM transinternationaldormNightroom WHERE transInternationalDormNightRoomId = '$id'";
    $result = mysqli_query($this->conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['isActive'];
}


 // update inner Night room
 public function UpdateInernatinalNightRoom($post, $_files){
    $id = self::test_input($post['id']);
    $master_domitory_id = self::test_input($post['id_dorm']);
    $title = self::test_input($post['title']);
    $brief = self::test_input($post['brief']);
    $image = self::moveImageToAnOtherFolder($_files, "image_inner", $post['image_exit']);

    $price = self::test_input($post['price']);
    
    $isActive = self::test_input($post['isActive']);
    

             // update statement
    $sql = "UPDATE transinternationaldormNightroom 
            SET master_domitory_id = $master_domitory_id, transInternationalDormNightRoomTitle='$title', 
            transInternationalDormNightRoomBrief='$brief',
            transInternationalDormNightRoomImage = '$image', 
            transInternationalDormNightRoomPrice = $price,
            isActive = $isActive
            WHERE transInternationalDormNightRoomId ='$id'";

     $result = mysqli_query($this->conn, $sql);
     
     if($result)
        header("location: TransinternationaldormNightRoom.php?sm=Update Record Successfully");
      else
      header("location: TransinternationaldormNightRoom.php?sm=".mysqli_errno($this->conn));     
     
}




// insert dorms
public function insertInternationalNightRoom($post, $_files){
    $master_domitory_id = self::test_input($post['id_dorm']);
    $title = self::test_input($post['title']);
    $brief = self::test_input($post['brief']);

    $image = self::moveImageToAnOtherFolderToInsert($_files, "image_inner");

    $price = self::test_input($post['price']);
    $isActive = self::test_input($post['isActive']);
    

   // insert statement
    $sql = "INSERT INTO transinternationaldormNightroom 
            (master_domitory_id, transInternationalDormNightRoomTitle, transInternationalDormNightRoomBrief, transInternationalDormNightRoomImage,
            transInternationalDormNightRoomPrice, isActive)
            VALUES('$master_domitory_id', '$title', '$brief', '$image', $price, $isActive)";
            

     $result = mysqli_query($this->conn, $sql);
     
     if($result)
        header("location: TransinternationaldormNightRoom.php?sm=Insert Record Successfully");
      else
      header("location: TransinternationaldormNightRoom.php?sm=".mysqli_error($this->conn));
      
     
}

// select data Night of  room inernational
public function selectNightInternationalRoom($id){
    $data = array();

    $sql = "SELECT 	* FROM transinternationaldormnightroom WHERE master_domitory_id = '$id'";
    $result = mysqli_query($this->conn, $sql);

    
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row; 
    }
    return $data;
    
}


// update the status of room 
public function updateStatus($post){


    $id_std1 = self::test_input($post['id_student']);
    $id_room = self::test_input($post['id_room']);

    //update statement for table student
    $sql1 = "UPDATE student_info
             SET transInnerDorrmTripleRoomId = 0, transInnerDorrmNightId = 0, 
             transInnerDorrmDoubleRoomId = 0, transInternationalDormDoubleRoomId = 0,
             transInternationalDormDoubleRoomSisterId = 0, transInternationalDormNightRoomId = '$id_room',
             transInternationalDormSingleRoomId = 0, transInternationalDormTripleRoomId =0
             WHERE university_ID in('$id_std1')";
    $result1 = mysqli_query($this->conn, $sql1);
  
    // update statement for table room 
     $sql2 = "UPDATE transinternationaldormNightroom
         SET isBooked = 1
         WHERE transInternationalDormNightRoomId = '$id_room'";
     
     $result2 = mysqli_query($this->conn, $sql2);
 
     if($result1 && $result2){
       echo '<script>alert("The room has been booked")</script>';
     }else{
         echo '<script>alert("'. mysqli_error($this->conn) .'")</script>';
     }
}



}// End of Class

// $m = new TransInternationalDormNightRoom();
// $m->SelectRoomData("transinternationaldormNightroom");
// $m->updateStatus(['id_room' => 3, "id_student"=> 710]);
