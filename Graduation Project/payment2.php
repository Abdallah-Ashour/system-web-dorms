<?php
@session_start();
include "class/TransInternationalDormSingleRoom.class.php";
include "class/TransInternationalDormDoubleRoomSister.class.php";
include "class/TransInternationalDormDoubleRoom.class.php";
include "class/TransInternationalDormTripleRoom.class.php";
include "class/TransInternationalDormNightRoom.class.php";

// update inner single Room
if(isset($_POST['chechout']) && $_GET['input'] == 0){
    $internationalNight = new TransInternationalDormSingleRoom();
    $internationalNight->updateStatus($_POST);

}elseif(isset($_POST['chechout']) && $_GET['input'] == 1 && $_GET['s'] == 1){
    $internationalDoubleS = new TransInternationalDormDoubleRoomSister();

    $internationalDoubleS->updateStatus($_POST);

}elseif(isset($_POST['chechout']) && $_GET['input'] == 1){
    $internationalDouble = new TransInternationalDormDoubleRoom();

    $internationalDouble->updateStatus($_POST);

}elseif(isset($_POST['chechout']) && $_GET['input'] == 2){
    $internationalTriple = new TransInternationalDormTripleRoom();

    $internationalTriple->updateStatus($_POST);

}elseif(isset($_POST['chechout']) && $_GET['input'] == 0){
    $internationalNight = new TransInternationalDormNightRoom();

    $internationalNight->updateStatus($_POST);

}



?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Finate - Job Portal Website Template Using Bootstrap 5"/>
    <meta name="keywords" content="accessories, digital products, electronic html, modern, products, responsive"/>
    <meta name="author" content="hastech"/>

    <link href="Css/Style.css" rel="stylesheet" />
</head>
<title>Payment</title>

<body>

  <!-- response update Records  -->
  <?php 
            if(isset($_GET['sm'])){
              ?>
              <div class="alert alert-success" role="alert">
                <?php echo $_GET['sm']; ?>
              </div>
            <?php } ?> 
              <!-- response Delete Records  -->
            <?php 
            if(isset($_GET['dm'])){
              ?>
              <div class="alert alert-danger" role="alert">
                <?php echo $_GET['dm']; ?>
              </div>
            <?php } ?> 

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>?input=<?php echo $_GET['input'];?>&id_room=<?php echo $_GET['id_room'];?>&s=<?php echo $_GET['s']?>">
        <div class="payment">
          
            
            <?php if(isset($_GET['input'])){?>
              <p class="payTittle">University ID for students</p>
              <?php for($i = 0; $i < $_GET['input']; $i++){?>
            
            <label>University ID <?php echo $i+1;?></label>
            <input type="text" class="payInput" name="id<?php echo $i + 1;?>" required>
            <?php }} ?>
            <input type="hidden" name="id_room" value="<?php echo $_GET['id_room']; ?>"> <!-- id for room -->
            <input type="hidden" name="id_student" value="<?php echo $_SESSION['id']; ?>"> <!-- id for student -->
            <p class="payTittle">Card Information</p>
            <div class="cardIcons">
                <img src="images/visa.png" width="40" alt="" class="cardIcon">
                <img src="images/master.png" width="40" alt="" class="cardIcon">
            </div>
            <input type="text" class="payInput" placeholder="Card Number" required minlength="14" maxlength="14">
            <div class="cardInfo">
                <input type="text" placeholder="mm" class="payInput sm" required minlength="2" maxlength="2">
                <input type="text" placeholder="yyyy" class="payInput sm" required minlength="4" maxlength="4">
                <input type="text" placeholder="cvv" class="payInput sm" required minlength="3" maxlength="3">
            </div>
            <button type="submit" class="payButton" name="chechout">Checkout!</button>
            
            <input type="hidden" name="s" value="<?php echo $_GET['s']?>">
            
      </div>
      </form>

</body>

</html>