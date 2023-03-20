<?php
$pageTitle = "Dorms"; // page title


spl_autoload_register(function($class){
    require_once "class/". $class . ".class.php";
});
// select name of dorm by id
$dorm = new Masterdormitory();
$nameOfDorm = $dorm->selectNameIdOfDorm($_GET['id']);

// select data Single room International
$SingleInternationalRoom = new TransInternationalDormSingleRoom();
$dataSingleInternationalRoom = $SingleInternationalRoom->selectSingleInternationalRoom($_GET['id']);

// select data  Double  room two sister International
$DoubleTwoSisterInternationalRoom = new TransInternationalDormDoubleRoomSister();
$dataDoubleTwoSisterInternationalRoom = $DoubleTwoSisterInternationalRoom->selectDoubleTwoSisterInternationalRoom($_GET['id']);

// select data  Double  room International
$DoubleInternationalRoom = new TransInternationalDormDoubleRoom();
$dataDoubleInternationalRoom = $DoubleInternationalRoom->selectDoubleInternationalRoom($_GET['id']);
// print_r($dataDoubleInternationalRoom);

// select data  Triple  room International
$TripleInternationalRoom = new TransInnerDorrmTripleRoom();
$dataTripleInternationalRoom = $TripleInternationalRoom->selectTripleInternationalRoom($_GET['id']);

// select data  Night  room International
$NightInternationalRoom = new TransInternationalDormNightRoom();
$dataNightInternationalRoom = $NightInternationalRoom->selectNightInternationalRoom($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>International</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&family=Jomhuria&family=Open+Sans:wght@300&family=Roboto:wght@100;300;500&display=swap"
      rel="stylesheet"
    />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/dorms.css" rel="stylesheet" />
    <link href="css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/slider.css" />
  </head>
  <body>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
    <!-- start navbar -->
    <?php include "navbar-footer/navbar.php"; ?>
    <!-- end navbar -->
    
    <!-- Start dorms -->
    <div class="dorms mt-5 mb-5">
      <div class="container">
        <div class="spical-heder mb-5 text-center">
          <h1><?php echo $nameOfDorm[0]['master_domitory_name']; ?></h1> <!-- name of dorms-->
        </div>

        <!-- select type of room -->
        <div class="mx-auto" style="width: 34%;">

        <select class="form-select form-select-lg mb-5" aria-label=".form-select-lg example">
          <option value ="0" selected>Select Type Of Room</option>
          <option value="1">single Room</option>
          <option value="2">Double room (two sisters)</option>
          <option value="3">Double room (two females)</option>
          <option value="4">Triple system room</option>
          <option value="5">Night Room</option>
        </select>
        </div>
        <!-- start Double room  -->
        
        <!-- start single room  -->
        <div id="single">
          
          <div class="row">
            <h3 class="text-black-50 mb-5">
              <i class="fa-solid fa-plus"></i> single room
            </h3>
          
            <?php
            $count
             = 0;
          foreach($dataSingleInternationalRoom as $dsiRoom){
            if($dsiRoom['isActive'] == 1){
              $href = "";
              if(isset($_SESSION['id'])) {
                $href ="payment2.php?input=0&id_room=" . $dsiRoom['transInternationalDormSingleRoomId'] . "&s=0";
              }else
                $href = "login.php";
          ?>
          
            <div class="col-lg-3 col-md-4 col-sm-6 text-center pl-5 mb-5">
              <div class="bg-light image">
                <img class="img-fluid images" src="images/image_inner/<?php echo $dsiRoom['transInternationalDormSingleRoomImage'];?>" alt="" />
                <h3>Room <?php echo ++$count;?></h3>
                <p class="Brief text-black-50 p-2 text-md-start fw-light " style="line-height: 1.7;   font-size: 15px; text-align: center !important;">
                  <?php echo $dsiRoom['transInternationalDormSingleRoomBrief'];?>
                </p>
                <h3 class="mt-3"><?php echo $dsiRoom['transInternationalDormSingleRoomPrice'];?> JD</h3>
                <?php if($dsiRoom['isBooked'] == 0){ ?>
                <a class="btn rounded-pill main-btn mb-4 bg-dark btn-dark text-white" style="padding: 5px 33px;"
                
                 href=<?php echo $href ?>>Payment</a>       
                 

                <?php }else{ 
                          ?>
                 <a class="btn rounded-pill main-btn mb-4 bg-danger text-white disabled" role="button" aria-disabled="true" style="padding: 5px 33px;" href="#">Booked</a>
                <?php } ?>
                
              </div>
            </div>
            <?php }} ?>
          
          </div>
        </div>
        <!-- End single room   -->

        <!-- start Double room (two sisters)  -->

        <div id="double-sister">

          <div class="row mt-5">
            <h3 class="text-black-50 mb-5">
              <i class="fa-solid fa-plus"></i> Double room (two sisters)
            </h3>
           
            <?php
            $count
             = 0;
          foreach($dataDoubleTwoSisterInternationalRoom as $ddtsiRoom){
            if($ddtsiRoom['isActive'] == 1){
              $href = "";
              if(isset($_SESSION['id'])) {
                $href ="payment2.php?input=1&id_room=" . $ddtsiRoom['transInternationalDormDoubleRoomSisterId'] . "&s=1";
              }else
                $href = "login.php";
          ?>
          
          
            <div class="col-lg-3 col-md-4 col-sm-6 text-center pl-5 mb-5">
              <div class="bg-light image">
                <img class="img-fluid images" src="images/image_inner/<?php echo $ddtsiRoom['transInternationalDormDoubleRoomSisterImage'];?>" alt="" />
                <h3>Room <?php echo ++$count;?></h3>
                <p class="Brief text-black-50 p-2 text-md-start fw-light " style="line-height: 1.7;   font-size: 15px; text-align: center !important;">
                  <?php echo $ddtsiRoom['transInternationalDormDoubleRoomSisterBrief'];?>
                </p>
                <h3 class="mt-3"><?php echo $ddtsiRoom['transInternationalDormDoubleRoomSisterPrice'];?> JD</h3>

                <?php if($ddtsiRoom['isBooked'] == 0){ ?>
                  <a class="btn rounded-pill main-btn mb-4 bg-dark btn-dark text-white" style="padding: 5px 33px;" 
                  href= <?php echo $href ;?>>Payment</a>
                <?php }else{ ?>
                 <a class="btn rounded-pill main-btn mb-4 bg-danger text-white disabled" role="button" aria-disabled="true" style="padding: 5px 33px;" href="#">Booked</a>
               <?php } ?>
              </div>
            </div>
            <?php }} ?>
            
          </div>
        </div>

        <!-- End Double room (two sisters)  -->

        <!-- start Double room (two females)  -->

        <div id="double">

          <div class="row mt-5">
            <h3 class="text-black-50 mb-5">
              <i class="fa-solid fa-plus"></i> Double room (two females)
            </h3>
            
            
            <?php
            $count
             = 0;
          foreach($dataDoubleInternationalRoom as $ddiRoom){
            if($ddiRoom['isActive'] == 1){
              $href = "";
              if(isset($_SESSION['id'])) {
                $href ="payment2.php?input=1&id_room=" . $ddiRoom['transInternationalDormDoubleRoomId'] . "&s=0";
              }else
                $href = "login.php";
          ?>
          
            <div class="col-lg-3 col-md-4 col-sm-6 text-center pl-5 mb-5">
              <div class="bg-light image">
                <img class="img-fluid images" src="images/image_inner/<?php echo $ddiRoom['transInternationalDormDoubleRoomImage'];?>" alt="" />
                <h3>Room <?php echo ++$count;?></h3>
                <p class="Brief text-black-50 p-2 text-md-start fw-light " style="line-height: 1.7;   font-size: 15px; text-align: center !important;">
                  <?php echo $ddiRoom['transInternationalDormDoubleRoomBrief'];?>
                </p>
                <h3 class="mt-3"><?php echo $ddiRoom['transInternationalDormDoubleRoomPrice'];?> JD</h3>

                <?php if($ddiRoom['isBooked'] == 0){ ?>
                  <a class="btn rounded-pill main-btn mb-4 bg-dark btn-dark text-white" style="padding: 5px 33px;"
                   href= <?php echo $href ; ?>>Payment</a>
                <?php }else{ ?>
                 <a class="btn rounded-pill main-btn mb-4 bg-danger text-white disabled" role="button" aria-disabled="true" style="padding: 5px 33px;" href="#">Booked</a>
               <?php } ?>

              </div>
            </div>
            <?php }} ?>
          
          </div>
          
        </div>
        <!-- End Double room (two females)  -->

        <!-- start Triple system room  -->

        <div id="triple">

          <div class="row mt-5">
            <h3 class="text-black-50 mb-5">
              <i class="fa-solid fa-plus"></i> Triple system room
            </h3>
            
            <?php
            $count
             = 0;
          foreach($dataTripleInternationalRoom as $dtiRoom){
            if($dtiRoom['isActive'] == 1){
              $href = "";
              if(isset($_SESSION['id'])) {
                $href ="payment2.php?input=2&id_room=" .$dtiRoom['transInternationalDormTripleRoomId'] . "&s=0";
              }else
                $href = "login.php";
          
          ?>
          
            <div class="col-lg-3 col-md-4 col-sm-6 text-center pl-5 mb-5">
              <div class="bg-light image">
                <img class="img-fluid images" src="images/image_inner/<?php echo $dtiRoom['transInternationalDormTripleRoomImage'];?>" alt="" />
                <h3>Room <?php echo ++$count;?></h3>
                <p class="Brief text-black-50 p-2 text-md-start fw-light " style="line-height: 1.7;   font-size: 15px; text-align: center !important;">
                  <?php echo $dtiRoom['transInternationalDormTripleRoomBrief'];?>
                </p>
                <h3 class="mt-3"><?php echo $dtiRoom['transInternationalDormTripleRoomPrice'];?> JD</h3>
                <?php if($dtiRoom['isBooked'] == 0){ ?>
                  <a class="btn rounded-pill main-btn mb-4 bg-dark btn-dark text-white" style="padding: 5px 33px;" 
                  href=<?php echo $href; ?>>Payment</a>
                <?php }else{ ?>
                 <a class="btn rounded-pill main-btn mb-4 bg-danger text-white disabled" role="button" aria-disabled="true" style="padding: 5px 33px;" href="#">Booked</a>
                <?php } ?>

              </div>
            </div>
            <?php }} ?>
          
          </div>
        </div>

        <!-- End Triple system room  -->

        <!-- start Temporary overnight stay (one night)  -->

        <div id="night">

          <div class="row mt-5">
            <h3 class="text-black-50 mb-5">
              <i class="fa-solid fa-plus"></i> Temporary overnight stay (one
              night)
            </h3>
            
            <?php
            $count
             = 0;
          foreach($dataNightInternationalRoom as $dNiRoom){
            if($dNiRoom['isActive'] == 1){
                $href = "";
                if(isset($_SESSION['id'])) {
                  $href ="payment2.php?input=0&id_room=" . $dNiRoom['transInternationalDormNightRoomId'] ."&s=0";
                }else
                  $href = "login.php";
            
            
          ?>
          
            <div class="col-lg-3 col-md-4 col-sm-6 text-center pl-5 mb-5">
              <div class="bg-light image">
                <img class="img-fluid images" src="images/image_inner/<?php echo $dNiRoom['transInternationalDormNightRoomImage'];?>" alt="" />
                <h3>Room <?php echo ++$count;?></h3>
                <p class="Brief text-black-50 p-2 text-md-start fw-light " style="line-height: 1.7;   font-size: 15px; text-align: center !important;">
                  <?php echo $dNiRoom['transInternationalDormNightRoomBrief'];?>
                </p>
                <h3 class="mt-3"><?php echo $dNiRoom['transInternationalDormNightRoomPrice'];?> JD</h3>

                <?php if($dNiRoom['isBooked'] == 0){ ?>
                  <a class="btn rounded-pill main-btn mb-4 bg-dark btn-dark text-white" style="padding: 5px 33px;"
                   href= <?php echo $href ;?>>Payment</a>
                <?php }else{ ?>
                 <a class="btn rounded-pill main-btn mb-4 bg-danger text-white disabled" role="button" aria-disabled="true" style="padding: 5px 33px;" href="#">Booked</a>
                <?php } ?>


              </div>
            </div>
            <?php }} ?>
          
          </div>
          
          </div>
          
        </div>
        <!-- End Temporary overnight stay (one night)  -->
      </div>
    </div>
    <!-- end dorms -->

    <!-- start footer -->
    <?php include "navbar-footer/footer.php"; ?>

    <!-- end footer -->

    <script>
      let select = document.querySelector("select");
      let selectValue;

      var single = document.getElementById("single");
      var double_sister = document.getElementById("double-sister");
      var double = document.getElementById("double");
      var triple = document.getElementById("triple");
      var night = document.getElementById("night");

      
      select.addEventListener('change', ()=>{
        selectValue = select.options[select.selectedIndex].value;
        if(selectValue == "1"){
          single.style.display = "block";
          double_sister.style.display = "none";
          triple.style.display = "none";
          double.style.display = "none";
          night.style.display = "none";

        }else if(selectValue == "2"){
          single.style.display = "none";
          double_sister.style.display = "block";          
          triple.style.display = "none";
          double.style.display = "none";
          night.style.display = "none";

          
        }else if(selectValue == "3"){
          single.style.display = "none";
          double_sister.style.display = "none";
          
          triple.style.display = "block";
          double.style.display = "none";
          night.style.display = "none";

        }else if(selectValue == "4"){
          single.style.display = "none";
          double_sister.style.display = "none";
          
          triple.style.display = "none";
          double.style.display = "block";
          night.style.display = "none";

        }else if(selectValue == "5"){
          single.style.display = "none";
          double_sister.style.display = "none";
          
          triple.style.display = "none";
          double.style.display = "none";
          night.style.display = "block";

        }else{
          single.style.display = "block";
          double_sister.style.display = "block";          
          triple.style.display = "block";
          double.style.display = "block";
          night.style.display = "block";

        }

          });
    </script>

  </body>
</html>
