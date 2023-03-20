<?php
@session_start();
include "class/TransInnerDorrmDoubleRoom.class.php";
include "class/TransInnerDorrmTripleRoom.class.php";
include "class/TransInnerDorrmNight.class.php";
// update inner double Room
if(isset($_POST['chechout']) && $_GET['input'] == 1){
    $innerDouble = new TransInnerDorrmDoubleRoom();

    $innerDouble->updateStatus($_POST);
}
// update inner Triple Room
if(isset($_POST['chechout']) && $_GET['input'] == 2){
    $innerTriple = new TransInnerDorrmTripleRoom();

    $innerTriple->updateStatus($_POST);
}

// update inner Triple Room
if(isset($_POST['chechout']) && $_GET['input'] == 0){
    $innerNight = new TransInnerDorrmNight();

    $innerNight->updateStatus($_POST);
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

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>?input=<?php echo $_GET['input'];?>&id_room=<?php echo $_GET['id_room'];?>">
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
            
      </div>
      </form>

</body>

</html>