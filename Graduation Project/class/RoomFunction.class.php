<?php
trait RoomFunction{
    // select the name and id of the romm is inner not international
 
public function selectNameIdofRoom($isInternational){
    $sql = "SELECT master_domitory_id, master_domitory_name
            FROM masterdormitory
            WHERE isInternational = $isInternational";
    $result = mysqli_query($this->conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }     
    return $data;
}


}

?>