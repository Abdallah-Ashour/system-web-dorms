<?php
include_once "DbConnection.class.php";

class Notification{
    use DbConnection;
    private $id ;
    private $message;
    // private $
    // private $
    // private $

    // methods

    public function __construct(){
        $this->conn = self::connection();
    }
    public function __destructor(){
        mysqli_close($this->conn);
    }

    public function store($post) {
        $message = $post['message'];
        $isInternational = $post['isInternational'];
        $sql = "insert into notifications (message, user_id, isInternational, status) values ('{$message}', '{$_SESSION['id']}', $isInternational, 0) ";
        $result = mysqli_query($this->conn, $sql);
     
        if($result)
           header("location: contactUs.php?sm=your message has been sent.");
         else
            header("location: contactUs.php?sm=".mysqli_error($this->conn));   
    }

    public function  getNotifications () {
        $sql = "SELECT
                    * 
                FROM
                    notifications
                    JOIN student_info ON notifications.user_id = student_info.university_ID 
                WHERE
                    STATUS = 0";

        $result = mysqli_query($this->conn, $sql);
        // Fetch all
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    } // end function get notification

    public function  getNotificationsisInnter ($isInternationl) {
        $sql = "SELECT
                    notifications.isInternational , Fname, Lname, message, status, created_at, id 
                FROM
                    notifications
                    JOIN student_info ON notifications.user_id = student_info.university_ID 
                WHERE
                    (STATUS = 0) AND (notifications.isInternational = {$isInternationl})";

        $result = mysqli_query($this->conn, $sql);
        // Fetch all
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    } // end function get notification for internationl or inner


    public function  SelectAllNotifications () {
        $sql = "SELECT
        notifications.isInternational,
        Fname,
        Lname,
        message,
        notifications.`status`,
        created_at,
        notifications.id ,
        user_id
    FROM
        student_info
        JOIN notifications ON notifications.user_id = student_info.university_ID 
    ";

        $result = mysqli_query($this->conn, $sql);
        // Fetch all
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $keys = array_column($result, 'id');
        array_multisort($keys, SORT_DESC, $result);
        return $result;
    } // end function Select all Notification notification

    public function  SelectAllNotificationsisInnter ($isInternational) {
        $sql = "SELECT
                    notifications.isInternational, Fname, Lname, message, status, created_at, id 
                FROM
                    notifications
                    JOIN student_info ON notifications.user_id = student_info.university_ID
                    WHERE (notifications.isInternational = {$isInternational})
                    ORDER BY created_at DESC";
                    // echo $sql;

        $result = mysqli_query($this->conn, $sql);
        // Fetch all
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    } // end function Select notification for internationl or inner

    public function  getIsInternationalFromStudent($id) {
        $sql = "SELECT
                    isInternational
                FROM
                    student_info
                WHERE university_ID = '$id'";

        $result = mysqli_query($this->conn, $sql);
        // Fetch all
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    } // end function Select all Notification notification

    public function  selectMessageToView($id) {
        $sql = "SELECT
                    * 
                FROM
                    notifications
                    JOIN student_info ON notifications.user_id = student_info.university_ID 
                WHERE
                    id = '{$id}'";

        $result = mysqli_query($this->conn, $sql);
        // Fetch all
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    } // end function get notification

    // update status 
    public function updateStatus($id){
        $sql = "UPDATE notifications
                SET status = 1
                WHERE id = '{$id}'";

        mysqli_query($this->conn, $sql);
    }

}

$n = new Notification();

// print_r($n->SelectAllNotifications());
$n->SelectAllNotificationsisInnter(0);