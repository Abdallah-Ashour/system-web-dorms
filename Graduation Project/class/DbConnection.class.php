<?php

trait DbConnection {
    // properites
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "dorms";
    public $conn = null;
    // method
    private function connection(){
        $this->conn = mysqli_connect($this->servername, $this->username,$this->password, $this->dbname);
        if (!$this->conn) {
            return die("Connection failed: " . mysqli_connect_error());
          }else{
            
            return $this->conn;
          }
    }// end function

    public function selectData($tableName){
        $tableName = self::test_input($tableName);
        
        $sql = "SELECT * FROM $tableName";

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
    } // end function

     // validation data function
     public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      // move Image To AnOther Folder to update
public function moveImageToAnOtherFolder($_files, $folderName, $image_exit){
    
  if(!empty($_files["image"]["name"])){
    $filename = $_files["image"]["name"];
  }else{
    $filename = $image_exit;
  }

  $tempname = $_files["image"]["tmp_name"];  

  $folder = "../images/" . $folderName . "/".$filename;

  if(file_exists($folder))
    return $filename;
  
      move_uploaded_file($tempname, $folder);
      return $filename;
}
      // move Image To AnOther Folder to update admin profile
      public function moveImageToAnOtherFolderAdmin($_files, $folderName, $image_exit){
    
        if(!empty($_files["image"]["name"])){
          $filename = $_files["image"]["name"];
        }else{
          $filename = $image_exit;
        }
      
        $tempname = $_files["image"]["tmp_name"];  
      
        $folder =  $folderName . "/".$filename;
      
        if(file_exists($folder))
          return $filename;
        
            move_uploaded_file($tempname, $folder);
            return $filename;
      }

     // move Image To AnOther Folder to insert
     public function moveImageToAnOtherFolderToInsert($_files, $folderName){
    
      if(!empty($_files["image"]["name"])){
        $ext = pathinfo($_files["image"]["name"], PATHINFO_EXTENSION);
        $filename = date('ymdhis')."-".rand(0, 112312312*5).$ext;
      }else{
        $filename = "Default.jpg";
      }
    
      $tempname = $_files["image"]["tmp_name"];  
    
      $folder = "../images/" . $folderName . "/".$filename;
    
      if(file_exists($folder))
        return $filename;
      
          if(move_uploaded_file($tempname, $folder))
          return $filename;

            
    
    
    }

    
    }// End Of Class
    
        
    


?>