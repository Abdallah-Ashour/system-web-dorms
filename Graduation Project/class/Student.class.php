<?php
include_once "DbConnection.class.php";

class Student{
    use DBConnection;
    // properties

    private $university_ID;
    private $Fname;
    private $Lname;
    private $gender;
    private $Enroll_current_semester;
    private $isAdmin;

    // methods

    public function __construct(){
        $this->conn = self::connection();
    }
    public function __destructor(){
        mysqli_close($this->conn);
    }

    public function validationLogin($post){

        // $action_direction = "home.php";
        // if(isset($_SERVER['HTTP_REFERER'])){
        //     $action_direction = $_SERVER['HTTP_REFERER'];
        //   }

        $username = self::test_input($post['username']);
        $password = sha1(self::test_input($post['upassword']));

       if(!empty($username) && !empty($password)){      

        $sql = "SELECT * FROM student_info
                WHERE university_ID = '$username' AND 
                spassword = '$password'";

        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);
         
        if(is_array($row)){
            if($row['gender'] == 1  && $row['isAdmin'] == 0){ // check if the student is female
                header("location: login.php?sm=Does Not Access To This Website&username=" . $row['university_ID']);
            }elseif($row['isAdmin'] == 0){
              session_start();
              $_SESSION['id'] = $row['university_ID'];
              $_SESSION['isAdmin'] = 0;
            //   header("location: $action_direction");
            header("location: home.php");


           }elseif($row['isAdmin'] == 1){

            session_start();
            $_SESSION['id'] = $row['university_ID'];
            $_SESSION['isAdmin'] = 1;
            header("location: NiceAdmin/navbar-footer.php");

           }// end else

        }// end if outside
        else{
            header("location: login.php?sm=username or password is Wrong&username=" . $row['university_ID']);
        }
    }else{
           $emInput = "";
           
        if(empty($username)){
            $emInput = "Please Enter The username";
            if(empty($password))
               $emInput .= " And Password";

            header("location: login.php?sm=$emInput");
        }elseif(empty($password)){
            $emInput = "Please Enter The Password";
            header("location: login.php?sm=$emInput&username=" . $username);

        }
    }

    }// End Function

    // End Session Student
    public function endSession(){
        session_start();
        
        session_unset();

        session_destroy();

        header("location: login.php");

    } // End function endSession 

       // End Session
       public function endSessionAdmin(){
        session_start();
        
        session_unset();

        session_destroy();

        header("location: ../login.php");

    } // End function endSession 

    //check the id of admin is include or not
    public function checkAdminId($username){
        $sql = "SELECT university_ID FROM student_info
                WHERE university_ID = '$username'";
        $result = mysqli_query($this->conn, $sql);
        if(mysqli_num_rows($result) == 1){
            return false;
        }else{
            return True;
        }
    }// end function chech admin id

    // insert Admin 
    public function insertAdmin($post){
        $Fname = self::test_input($post['Fname']);
        $Lname = self::test_input($post['Lname']);
        $gender = self::test_input($post['gender']);
        $username = self::test_input($post['username']);
        $password = sha1(self::test_input($post['password']));
        $isInternational = self::test_input($post['isInternational']);
    
    if(self::checkAdminId($username) == true){
   // insert statement
    $sql = "INSERT INTO student_info (Fname, Lname, gender,
           university_ID, spassword, isInternational ,Enroll_current_semester, isAdmin)
            VALUES('$Fname', '$Lname', $gender, '$username', '$password', '$isInternational', 1, 1)";
            

     $result = mysqli_query($this->conn, $sql);
     
     if($result)
        header("location: pages-delete-admin.php?sm=Insert Admin Successfully");
      else
      header("location: pages-add-admin.php?sm=".mysqli_error($this->conn));


    }else{
        header("location: pages-add-admin.php?em= username is exist <br> Please Enter The Other Username");

    }
    
    } // end function insert admin

  public function getinfoAdmin($id){
    $sql = "SELECT isInternational FROM student_info
    WHERE university_ID='$id'";
    $result = mysqli_query($this->conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
  }
    // delete Records 
    public function deleteRecords($delet_id){
    $delet_id = self::test_input($delet_id);
    $sql = "DELETE FROM student_info WHERE university_ID = '$delet_id'";
    mysqli_query($this->conn, $sql);
}

// select data admin
    public function selectData(){
    
    $sql = "SELECT * FROM student_info WHERE isAdmin = 1 AND university_ID != 'Admin'";

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

   // Select data by Id
   public function SelectById($id){

    $id = self::test_input($id);
    $sql = "SELECT * FROM student_info WHERE university_ID = '$id'";
    $result = mysqli_query($this->conn, $sql);
    return mysqli_fetch_assoc($result);
}// end select by id

// get name and id of dorms
public function getIdNameOfDorms(){
    $sql = "SELECT master_domitory_id, master_domitory_name
            FROM masterdormitory";
    $data = array();
    $result = mysqli_query($this->conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
       $data[] = $row;
    }
    return $data;
}
// update Admin Profile
public function updateAdmin($post, $_files){

        $id = self::test_input($post['id']);
        $Fname = self::test_input($post['Fname']);
        $Lname = self::test_input($post['Lname']);
        // $password = sha1(self::test_input($post['password']));
        $image = self::moveImageToAnOtherFolderAdmin($_files, "image_admin", $post['image_exit']);



        $sql = "UPDATE student_info 
                SET Fname='$Fname', Lname='$Lname',
                image = '$image'
                WHERE university_ID='$id'";

         $result = mysqli_query($this->conn, $sql);
         
         if($result == true)
            header("location: pages-editProfile-admin.php?sm=Update Record Successfully&default=1");
 
} // end update admin profile


// update Admin password
public function updateAdminPassword($post){
    $id = self::test_input($post['id']);

    $cpassword = sha1(self::test_input($post['current-password']));
    $npassword = sha1(self::test_input($post['new-password']));

    
    $sqls = "SELECT Fname FROM student_info 
             WHERE university_ID = '$id' and spassword = '$cpassword'"; 
    $results = mysqli_query($this->conn, $sqls);

    if(mysqli_num_rows($results) == 1){
    $sql = "UPDATE student_info 
            SET spassword='$npassword'
            WHERE university_ID='$id'";

     $result = mysqli_query($this->conn, $sql);
     
     if($result == true)
        header("location: pages-editpassword-admin.php?sm=Update Password Successfully&default=1");

    }else{
        header("location: pages-editPassword-admin.php?em=password is Wrong&editid=". $_SESSION['id']);

    }
} // end update admin Password

// report about Reserved Room Report
public function report(){
    $records = array();

    $sql = "SELECT university_ID, Fname, Lname, isInternational
            FROM student_info
            WHERE isAdmin = 0 And (transInnerDorrmNightId != 0 OR transInnerDorrmDoubleRoomId != 0
            OR transInnerDorrmTripleRoomId != 0 OR transInternationalDormDoubleRoomId != 0
            OR transInternationalDormDoubleRoomSisterId OR transInternationalDormNightRoomId != 0 OR
            transInternationalDormSingleRoomId != 0 OR transInternationalDormTripleRoomId != 0)";
    $result = mysqli_query($this->conn, $sql);
     $i = 0;
     
    while($row = mysqli_fetch_assoc($result)){
        $records[] = $row;
        /*
        $r = [$row['transInnerDorrmNightId'], $row['transInnerDorrmDoubleRoomId'], $row['transInnerDorrmTripleRoomId'],
             $row['transInternationalDormDoubleRoomId'], $row['transInternationalDormDoubleRoomSisterId'], 
             $row['transInternationalDormNightRoomId'], $row['transInternationalDormSingleRoomId'],
              $row['transInternationalDormTripleRoomId']];
              
        for($j = 0; $j < 8; $j++ ){

        switch($r[$j]){
            case $r[$j] != 0:                  
        }
    }
    */
    }
   
    $csv_file = "csv_export_" . date("y-m-d") . ".csv";
    $flag = true;

    header("Content-Type: text/csv");
    header("Content-Disposition: attachment; filename=". $csv_file);

    $fh = fopen( 'php://output', 'w' );
    foreach($records as $record){
        array_slice($record, 0, 5);
        if($flag){
            fputcsv($fh, ['username', 'Fname', 'Lname', 'isInternational']);
            $flag = false;
        }else{
            if($record['isInternational'] == 0){
                $record['isInternational'] = 'Yes';
            }else{
                $record['isInternational'] = 'No';
            }
            fputcsv($fh, array_values(array_slice($record, 0, 5)));

        }
    }
    fclose($fh);
    exit;
    $actionBack = $_SERVER['HTTP_REFERER'];
    header("location: $actionBack");
} // end function report

// get name by id
public function getAdminInfo($id){
    $sql = "SELECT Fname, Lname, image FROM student_info
           WHERE university_ID='$id'";
    $result = mysqli_query($this->conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}




}
?>