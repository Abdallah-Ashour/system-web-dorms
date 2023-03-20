<?php
$pageTitle = "Dorms"; // page title
spl_autoload_register(function($class){
    require_once "class/". $class . ".class.php";
});

// select name of dorm by id
$dorm = new Masterdormitory();
$nameOfDorm = $dorm->selectNameIdOfDorm($_GET['id']);

// select data od double room
$DobleRoom = new TransInnerDorrmDoubleRoom();
$dataDobleRoom = $DobleRoom->selectDoubleRoom($_GET['id']);

// select data od Triple room
$TripleRoom = new TransInnerDorrmTripleRoom();
$dataTripleRoom = $TripleRoom->selectTripleRoom($_GET['id']);

// select data od Night room
$NightRoom = new TransInnerDorrmNight();
$dataNightRoom = $NightRoom->selectNightRoom($_GET['id']);


// print_r($dataTripleRoom);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inner</title>
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
            <option value="1">Doube Room</option>
            <option value="2">Triple Room</option>
            <option value="3">Night Room</option>
          </select>
          
        </div><!-- start Double room  -->
        
        <div id="double">
          <div class="row">
          
            <h3 class="text-black-50 mb-5">
              <i class="fa-solid fa-plus"></i> Double room
            </h3>
            <?php
            $count
             = 0;
          foreach($dataDobleRoom as $ddRoom){
            if($ddRoom['isActive'] == 1){
              $href = "";
              if(isset($_SESSION['id'])) {
                $href ="payment.php?input=1&id_room=" . $ddRoom['transInnerDorrmDoubleRoomId'];
              }else
                $href = "login.php";
          ?>
          
            <div class="col-lg-3 col-md-4 col-sm-6 text-center pl-5 mb-5">
              <div class="bg-light image">
                <img class="img-fluid images" src="images/image_inner/<?php echo $ddRoom['transInnerDorrmDoubleRoomImage'];?>" alt="" />
                <h3>Room <?php echo ++$count;?></h3>
                <p class="Brief text-black-50 p-2 text-md-start fw-light " style="line-height: 1.7;   font-size: 15px; text-align: center !important;">
                  <?php echo $ddRoom['transInnerDorrmDoubleRoomBrief'];?>
                </p>
                <h3 class="mt-3 pb-3"><?php echo $ddRoom['transInnerDorrmDoubleRoomPrice'];?> JD</h3>

                <?php if($ddRoom['isBooked'] == 0){ ?>
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
        <!-- End Double room    -->

        <!-- start Triple system room   -->
        <div id="triple">

          <div class="row mt-5">
            <h3 class="text-black-50 mb-5">
              <i class="fa-solid fa-plus"></i> Triple system room
            </h3>           
          <?php
          $countT
           = 0;
        foreach($dataTripleRoom as $dtRoom){
          if($dtRoom['isActive'] == 1){
            $href = "";
            if(isset($_SESSION['id'])) {
              $href ="payment.php?input=2&id_room=" . $dtRoom['transInnerDorrmTripleRoomId'];
            }else
              $href = "login.php";
        
        ?>
       
          <div class="col-lg-3 col-md-4 col-sm-6 text-center pl-5 mb-5">
            <div class="bg-light image">
              <img class="img-fluid images" src="images/image_inner/<?php echo $dtRoom['transInnerDorrmTripleRoomImage'];?>" alt="" />
              <h3>Room <?php echo ++$countT;?></h3>
              <p class="Brief text-black-50 p-2 text-md-start fw-light " style="line-height: 1.7;   font-size: 15px; text-align: center !important;">
                <?php echo $dtRoom['transInnerDorrmTripleRoomBrief'];?>
              </p>
              <h3 class="mt-3 pb-3"><?php echo $dtRoom['transInnerDorrmTripleRoomPrice'];?> JD</h3>

              <?php if($dtRoom['isBooked'] == 0){ ?>
                <a class="btn rounded-pill main-btn mb-4 bg-dark btn-dark text-white" style="padding: 5px 33px;" 
                href= <?php echo $href; ?>>Payment</a>
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
            $countT
             = 0;
          foreach($dataNightRoom as $dtRoom){
            if($dtRoom['isActive'] == 1){
              $href = "";
              if(isset($_SESSION['id'])) {
                $href ="payment.php?input=0&id_room=" . $dtRoom['transInnerDorrmNightId'];
              }else
                $href = "login.php";
          ?>
          
            <div class="col-lg-3 col-md-4 col-sm-6 text-center pl-5 mb-5">
              <div class="bg-light image">
                <img class="img-fluid images" src="images/image_inner/<?php echo $dtRoom['transInnerDorrmNightRoomImage'];?>" alt="" />
                <h3>Room <?php echo ++$countT;?></h3>
                <p class="Brief text-black-50 p-2 text-md-start fw-light " style="line-height: 1.7;   font-size: 15px; text-align: center !important;">
                  <?php echo $dtRoom['transInnerDorrmNightRoomBrief'];?>
                </p>
                <h3 class="mt-3 pb-3"><?php echo $dtRoom['transInnerDorrmNightRoomPrice'];?> JD</h3>

                <?php if($dtRoom['isBooked'] == 0){ ?>
                <a class="btn rounded-pill main-btn mb-4 bg-dark btn-dark text-white" style="padding: 5px 33px;" 
                href=<?php echo $href;?>>Payment</a>
                <?php }else{ ?>
                 <a class="btn rounded-pill main-btn mb-4 bg-danger text-white disabled" role="button" aria-disabled="true" style="padding: 5px 33px;" href="#">Booked</a>
                <?php } ?>

              </div>
            </div>
            <?php }} ?>
          
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
      
      var double = document.getElementById("double");
      var triple = document.getElementById("triple");
      var night = document.getElementById("night");

      
      select.addEventListener('change', ()=>{
        selectValue = select.options[select.selectedIndex].value;
        if(selectValue == "1"){
          triple.style.display = "none";
          double.style.display = "block";
          night.style.display = "none";

        }else if(selectValue == "2"){
          triple.style.display = "block";
          double.style.display = "none";
          night.style.display = "none";

          
        }else if(selectValue == "3"){
          triple.style.display = "none";
          double.style.display = "none";
          night.style.display = "block";

        }else{
          triple.style.display = "block";
          double.style.display = "block";
          night.style.display = "block";

        }

          });
    </script>

  </body>
</html>
