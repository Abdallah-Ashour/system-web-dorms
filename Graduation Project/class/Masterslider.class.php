<?php
include_once "DbConnection.class.php";

class Masterslider{
    use DbConnection;
  // properites
  private $master_slider_id;
  private $master_slider_image_url;
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
        $sql = "DELETE FROM masterslider WHERE master_slider_id = $delet_id";
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
        
        $sql = "UPDATE masterslider 
                SET isActive = $aValue
                WHERE master_slider_id = '$id'";
        
        mysqli_query($this->conn, $sql);
        
    }// End of Active Records

    // Select data by Id
    public function SelectById($id){
        $id = self::test_input($id);
        $sql = "SELECT * FROM masterslider WHERE master_slider_id = '$id'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }
 
    // update slider
 public function UpdateSlider($post, $_files){
    $id = self::test_input($post['id']);
    $title = self::test_input($post['title']);


    $image = self::moveImageToAnOtherFolder($_files, "image_slider", $post['image_exit']);
    $isActive = self::test_input($post['isActive']);
    

   // update statement
    $sql = "UPDATE masterslider 
            SET master_slider_title = '$title',
            master_slider_image_url = '$image', 
            isActive = $isActive
            WHERE master_slider_id ='$id'";

     $result = mysqli_query($this->conn, $sql);
     
     if($result)
        header("location: slider.php?sm=Update Record Successfully");
      else
      header("location: dorm-edit-form.php?sm=".mysqli_errno($this->conn));
      
     
}// end update function

// Insert slider
public function insertSlider($post, $_files){
    $title = self::test_input($post['title']);
    $image = self::moveImageToAnOtherFolderToInsert($_files, "image_slider");
    $isActive = self::test_input($post['isActive']);
    

   // insert statement
    $sql = "INSERT INTO masterslider (master_slider_title, master_slider_image_url, 
            isActive, isDelete) 
            VALUES('$title', '$image', $isActive, 0)";
            

     $result = mysqli_query($this->conn, $sql);
     
     if($result)
        header("location: slider.php?sm=Insert Record Successfully");
      else
      header("location: slider-add-form.php?sm=".mysqli_errno($this->conn));
      
     
}//end insert function
    
    
}// End class
?>