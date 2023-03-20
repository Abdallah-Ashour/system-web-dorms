<?php 
$pageTitle = "Home"; // page title
include "class/Masterdormitory.class.php"; // class of dorms
include "class/Masterslider.class.php"; // class of slider

// slider
$master_slider = new Masterslider();
$dataSlider = $master_slider->selectData("masterslider");

// dorms 
$master_dormitory = new Masterdormitory(); // object of dorms
$dataDorms = $master_dormitory->selectData("masterdormitory"); // data of dorms


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
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
    <?php 

    include "navbar-footer/navbar.php"; 
            
    ?>

    <!-- end navbar -->
    <!-- start landing -->

    <div class="landind"> 
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">

          <?php // data of slider
          $fSlider = false;
          foreach($dataSlider as $dSlider){
                if($dSlider['isActive'] == 1){
                  if(!$fSlider){ 
                    $fSlider = true;?>
          <div class="carousel-item active" data-bs-interval="4000">
            <img src="images/image_slider/<?php echo $dSlider['master_slider_image_url']?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block" style="left: 50%;
            transform: translateX(-50%);top: 25%;">
              <h5 class="bg-white text-black  opacity-75 fs-3 pt-5 pb-5 text-capitalize" style="border-radius: 17px; font-size: 30px; width: 110% !important;; ">Welcome to the University Of Jordan<br class="mt-5">dormitory website

</h5>
            </div>
          </div>
            <?php }else{ ?>

              <div class="carousel-item" data-bs-interval="2000">
            <img src="images/image_slider/<?php echo $dSlider['master_slider_image_url']?>" class="d-block w-100"  alt="...">
            <div class="carousel-caption d-none d-md-block"  style="left: 50%;
            transform: translateX(-50%);top: 25%;">
              <h5 class="bg-white text-black  opacity-75 fs-3 pt-5 pb-5 text-capitalize" style="border-radius: 17px; font-size: 30px; width: 110% !important;; ">Welcome to the University Of Jordan <br class="mt-5"/>dormitory website</h5>
            </div>
              </div>
            <?php } }}?>
          <!-- </div>
          -->

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
</div>
        </div>
    <!-- end landing -->
    <!-- Start dorms -->
        
    
    <div class="dorms">
      <div class="container  mt-5 mb-5">
        <div class="spical-heder mb-5 text-center">
          <h2>Student dormitories</h2>
          <p class="text-black-50">
            There are Four dorm buildings as shown below
          </p>
        </div>
        <div class="row" >

        <?php foreach($dataDorms as $dDorms){
              if($dDorms['isActive'] == 1){?>
       
          <div class="col-lg-3 col-md-6 text-center mb-5 shadow " style="border-radius: 10px; border: 1px solid transparent;">
            <div class="bg-light image">
              <img class="img-fluid w-100 images rounded mt-3" src="images/image_dorm/<?php echo $dDorms['master_domitory_image']; ?>" alt="image" />
              <h3 class="mt-3"> <?php echo $dDorms['master_domitory_name']; ?> </h3>
              <p class="text-black-50 p-4 text-md-start fw-light" style="line-height: 1.7; text-align: justify !important;  font-size: 15px; ">

              
              <?php echo $dDorms['master_domitory_brief']; ?>

              </p>
              <a class="btn rounded-pill main-btn mb-4  text-white" style= "background-color: #782836;" href="<?php echo $dDorms['master_domitory_link_url'];?>?id=<?php echo $dDorms['master_domitory_id']; ?>">ReadMore</a>
              <a class="btn rounded-pill main-btn mb-4 bg-dark text-white" href="<?php echo $dDorms['master_domitory_link_map']; ?>" target="_blank">Map</a> 

            </div>
          </div>
          <?php } } ?>

          <!-- <div class="col-lg-3 col-md-6 text-center mb-5">
            <div class="bg-light image">
              <img class="img-fluid w-100 images" src="images/dorm1.jfif" alt="" />
              <h3 class="mt-3">Ammon  dormitory</h3>
              <p class="p-3 text-black-50 text-md-start">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Exercitationem molestiae omnis perspiciatis. Accusamus iste.
              </p>
              <a class="btn rounded-pill main-btn mb-4" href="ammon-dormitory.php">ReadMore</a>
            </div>
        </div>
          <div class="col-lg-3 col-md-6 text-center mb-5">
            <div class="bg-light image">
              <img class="img-fluid w-100 images" src="images/dorm2.jpg" alt="" />
              <h3 class="mt-3">Andalus dormitory</h3>
              <p class="p-3 text-black-50 text-md-start">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Exercitationem molestiae omnis perspiciatis. Accusamus iste.
              </p>
              <a class="btn rounded-pill main-btn mb-4" href="andalus-dormitory.php">ReadMore</a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center mb-5">
            <div class="bg-light image">
              <img class="img-fluid w-100 images" src="images/dorm2.jpg" alt="" />
              <h3 class="mt-3">Zahraa dormitory</h3>
              <p class="p-3 text-black-50 text-md-start">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Exercitationem molestiae omnis perspiciatis. Accusamus iste.
              </p>
              <a class="btn rounded-pill main-btn mb-4" href="zahraa-dormitory.php">ReadMore</a>
            </div>
            
        </div>
         -->
      </div>
    </div>
    <!-- end dorms -->
    <!-- start footer -->
    
    <?php include "navbar-footer/footer.php"; ?>

    <!-- end footer -->
    
  </body>
    </html>
