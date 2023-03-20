<?php
session_start();
if(!isset($_SESSION['id']))
   header("location: ../login.php?sm=Does Not Access TO This Page");
if(!$_SESSION['isAdmin'] == 1)
header("location: ../login.php?sm=Does Not Access TO This Page");


include "../class/Masterdormitory.class.php";
include_once "../class/Student.class.php";

$dorm = new Masterdormitory();

// select data by id

// add records
if(isset($_POST['add'])){
    $dorm->insertDorm($_POST, $_FILES);
  }
  
  
  $std = new Student();
  $adminInfo = $std->getinfoAdmin($_SESSION['id']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Form Edit Dorms</title>
  <meta name="robots" content="noindex, nofollow">
  <meta content="" name="description">
  <meta content="" name="keywords">

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
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Home</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="navbar-footer.php">
              <i class="bi bi-circle"></i><span>Navbar</span>
            </a>
          </li>
          <li>
            <a href="slider.php" >
              <i class="bi bi-circle"></i><span>Slider</span>
            </a>
          </li>
          <li>
            <a href="Dorms.php" class="active">
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
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="TransInnerDorrmDoubleRoom.php">
              <i class="bi bi-circle"></i><span>Inner Dorrm Double Room</span>
            </a>
          </li>
          <li>
            <a href="TransInnerDorrmTripleRoom.php" >
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
        <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="TransinternationaldormsingleRoom.php">
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
      <h1>Home</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Dorms</li>
          <li class="breadcrumb-item active">Add Form</li>

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section bg-white p-4 rounded" style="width: 30%;">
            <!-- form to insert data  -->
      
            <form action="dorm-add-form.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                    <label for="name" class="form-label font-weight-bold"><b>Name:</b></label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="brief" class="form-label font-weight-bold"><b>Brief:</b></label>
                    <input type="text" class="form-control" id="brief" name="brief" required>
                </div>

                <div class="mb-3">
                    <label for="linkDorm" class="form-label "><b>Link Dorm:</b></label>
                    <input type="text" class="form-control" id="linkDorm" name="linkDorm" required> 
                </div>

                <div class="mb-3">
                    <label for="linkMap" class="form-label "><b>Link Map:</b></label>
                    <input type="text" class="form-control" id="linkMap" name="linkMap" required>
                </div>
                <label><b>International:</b></label>
                <br>
                
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="isInternational" id="inlineRadio1" value="1" required>
                  <label class="form-check-label p-1" style="margin-right: 5px;" for="inlineRadio1"><b>True</b></label>
                </div>
                <br>
                <div class="form-check form-check-inline" style="margin-right: 5px;">
                  <input class="form-check-input" type="radio" name="isInternational" id="inlineRadio2" value="0" required>
                  <label class="form-check-label p-1"  for="inlineRadio2"><b>False</b></label>
                </div>
                <br> <br>


                <div class="form-group">
                  <label for="iamge"><b>Image:</b></label><br>
                  <input type="file" class="form-control-file" id="image" name="image">

                </div>
                <br>

                <label><b>Active:</b></label>
                <br>

                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="isActive" id="inlineRadio1" value="1" required>
                  <label class="form-check-label p-1" style="margin-right: 5px;" for="inlineRadio1"><b>True</b></label>
                </div>
                <br>
                <div class="form-check form-check-inline" style="margin-right: 5px;">
                  <input class="form-check-input" type="radio" name="isActive" id="inlineRadio2" value="0" required>
                  <label class="form-check-label p-1"  for="inlineRadio2"><b>False</b></label>
                </div>
                <br><br>
                <button type="submit" class="btn btn-primary" name="add" value="submit">Inser</button>


            </form>        
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  

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