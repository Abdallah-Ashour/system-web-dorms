<?php
session_start();
if(!isset($_SESSION['id']))
   header("location: ../login.php?sm=Does Not Access TO This Page");
if(!$_SESSION['isAdmin'] == 1)
header("location: ../login.php?sm=Does Not Access TO This Page");


include "../class/TransInternationalDormSingleRoom.class.php";
include_once "../class/Student.class.php";

$inernamtionalsingleRoom = new TransInternationalDormSingleRoom();

// DeleteRecords 
if(isset($_GET['deleteid'])){
  $inernamtionalsingleRoom->deleteRecords($_GET['deleteid']);
}
// Active Records
if(isset($_GET['isActive']) && isset($_GET['id'])){
    $inernamtionalsingleRoom->isActive($_GET['id'], $_GET['isActive']);    
}

$inernamtionalsingleRoomData = $inernamtionalsingleRoom->SelectRoomData("transinternationaldormsingleroom"); // select data of menu


$std = new Student();
$adminInfo = $std->getinfoAdmin($_SESSION['id']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Components / Badges - NiceAdmin Bootstrap Template</title>
  <meta name="robots" content="noindex, nofollow">
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="../../../css.css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../css/all.min.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <?php 
  include "nav-admin.php";
  ?>
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Home</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="navbar-footer.php">
              <i class="bi bi-circle"></i><span>Navbar</span>
            </a>
          </li>
          <li>
            <a href="slider.php">
              <i class="bi bi-circle"></i><span>Slider</span>
            </a>
          </li>
          <li>
            <a href="Dorms.php">
              <i class="bi bi-circle"></i><span>Dorms</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Components Nav -->
      <?php if($adminInfo['isInternational'] == 0 || $_SESSION['id'] == "Admin"){?>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Inner Dorms Room</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="TransInnerDorrmDoubleRoom.php" >
              <i class="bi bi-circle"></i><span>Inner Dorm Double Room</span>
            </a>
          </li>
          <li>
            <a href="TransInnerDorrmTripleRoom.php">
              <i class="bi bi-circle"></i><span>inner Dorm Triple Room</span>
            </a>
          </li>
          <li>
            <a href="TransInnerDorrmNightRoom.php">
              <i class="bi bi-circle"></i><span>inner Dorm Night Room</span>
            </a>
          </li>
           
        </ul>
      </li><!-- End Forms Nav -->
      <?php } ?>
      <?php if($adminInfo['isInternational'] == 1 || $_SESSION['id'] == "Admin"){?>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>international Dorms Room</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="TransinternationaldormsingleRoom.php" class="active">
              <i class="bi bi-circle"></i><span>international dorm single Room</span>
            </a>
          </li>
          <li>
            <a href="TransInternationalDormDoubleRoom.php">
              <i class="bi bi-circle"></i><span>international dorm Double Room</span>
            </a>
          </li>

          <li>
            <a href="TransInternationalDormDoubleRoomSister.php">
              <i class="bi bi-circle"></i><span>international dorm Double Room (Two Sister)</span>
            </a>
          </li>
          <li>
            <a href="TransInternationalDormTripleRoom.php">
              <i class="bi bi-circle"></i><span>international dorm Triple Room</span>
            </a>
          </li>
          <li>
            <a href="TransInternationalDormNightRoom.php">
              <i class="bi bi-circle"></i><span>international dorm Night Room</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
      <?php } ?>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Admin control</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
        <?php if(isset($_SESSION['id']) && $_SESSION['id'] == "Admin"){ ?>
          <li>
            <a href="pages-delete-admin.php" class="active">
              <i class="bi bi-circle" ></i><span>Admin modification</span>
            </a>
          </li>
          <?php } ?>
        
          <li>
            <a href="pages-editProfile-admin.php?editid=<?php echo $_SESSION['id'];?>">
              <i class="bi bi-circle"></i><span>Edit Profile</span>
            </a>
          </li>
          
          <li>
            <a href="pages-editPassword-admin.php?editid=<?php echo $_SESSION['id'];?>">
              <i class="bi bi-circle"></i><span>Edit Password</span>
            </a>
          </li>

          
        </ul>

        <!-- 
        <li class="nav-item">
        <a class="nav-link collapsed"   href="report.php">
          <i class="bi bi-gem"></i><span>Reserved Room Report </i>
        </a> -->

       
      </li><!-- End Icons Nav -->

      <li class="nav-item">
                <a class="nav-link collapsed" href="endSessionAdmin.php">
                    <i class="bi bi-arrow-left-square"></i>
                    <span>Logout</span>
                </a>
     </li>
      

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Inernational</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dorms</a></li>
          <li class="breadcrumb-item active">Inernational Single Room</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      
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


            <!-- Button to Insert Data -->

<a href="TransinternationaldormsingleRoom-add-form.php" class="btn btn-primary mb-3" rel="noopener noreferrer">Add New Records</a>


    <!-- table for edit, delete and Active element -->
            <div class="table-responsive">
              <table class="table table-bordered  table-hover">
                  <thead>
                    <tr class="bg-dark text-white">
                      
                        <th>Room Number</th>
                        <th>Name</th>
                        <th>Brief</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Active</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                     $count = 1;
                     foreach($inernamtionalsingleRoomData as $iNSRData){
                    ?>
                    <tr class="text-center">
                      <td><?php echo "Room" . $count++;?></td>
                      <td> <?php echo $iNSRData['master_domitory_name']; ?> </td>
                      <td><?php echo $iNSRData['transInternationalDormSingleRoomBrief']; ?></td>
                       <td> <img src="../images/image_inner/<?php echo $iNSRData['transInternationalDormSingleRoomImage']; ?>" width="80" height="50" alt="image"> </td>
                       <td> <?php echo $iNSRData['transInternationalDormSingleRoomPrice']; ?></td>

                      <td> 
                      <a href="TransinternationaldormsingleRoom.php?id= <?php echo $iNSRData['transInternationalDormSingleRoomId'] . "&isActive=" . $inernamtionalsingleRoom->getActive($iNSRData['transInternationalDormSingleRoomId'])?>" style ="color: #000">
                         <?php
                          if($inernamtionalsingleRoom->getActive($iNSRData['transInternationalDormSingleRoomId']) == 1){
                           echo "<i class='fa-solid fa-eye fa-2x'></i>";
                          }else{
                            echo '<i class="fa-solid fa-eye-slash fa-2x"></i>';
                          }
                         ?>
                    </a>
                     </td>
                      <td> <a href="TransinternationaldormsingleRoom-edit-form.php?editid= <?php echo $iNSRData['transInternationalDormSingleRoomId'];?>" style ="color: #000"><i class="fa-sharp fa-2x fa-solid fa-pen-to-square"></i></a> </td>
                      <td><a href="TransinternationaldormsingleRoom.php?deleteid=<?php echo $iNSRData['transInternationalDormSingleRoomId'];?>&dm=Delete Records Successfully" onclick = "return confirm('Are you sure to delete?')" >
                      <i class="fa-sharp fa-solid fa-trash fa-2x text-dark"></i></a>
                    </td> 
              
              
                    </tr>
                    <?php }?>
                  </tbody>
              </table>
            </div>  
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
   
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>if( window.self == window.top ) { (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','//www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-55234356-4', 'auto'); ga('send', 'pageview'); } </script>
</body>

</html>