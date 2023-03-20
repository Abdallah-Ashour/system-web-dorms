<?php 
session_start();
if(!isset($_SESSION['id']) && !$_SESSION['isAdmin'] == 1)
   header("location: ../login.php?sm=Does Not Access TO This Page");


include_once "../class/Student.class.php";
$std = new Student();

if(isset($_POST['update'])){
   $std->updateAdmin($_POST, $_FILES);
}
if(isset($_GET['editid']))
$stdData = $std->SelectById($_GET['editid']); // select data of admin



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Register - NiceAdmin Bootstrap Template</title>
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
  

  <main>
    <div class="container">
     <?php if(!isset($_GET['default'])){?>
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">NiceAdmin</span>
                </a>
              </div><!-- End Logo -->
        
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Update Admin  Account</h5>
                  </div>
             
                  <form class="row g-3 needs-validation" novalidate="" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                  <div class="form-group">
                  <label for="iamge"><b>Image:</b></label><br>
                  <input type="file" class="form-control-file" id="image" name="image">
                  <input type="hidden" name="image_exit" value="<?php echo $stdData['image']; ?>">

                   </div>
                   <br>            
  
                  
                  <div class="col-12">
                      <label for="yourName" class="form-label">Your First Name</label>
                      <input type="text" name="Fname" class="form-control" id="yourName" required="" value="<?php echo $stdData['Fname']; ?>">
                      <div class="invalid-feedback">Please, enter your first name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Last Name</label>
                      <input type="text" name="Lname" class="form-control" id="yourName" required="" value="<?php echo $stdData['Lname']; ?>">
                      <div class="invalid-feedback">Please, enter your last name!</div>
                    </div>

                   
                    <!-- <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required="" >
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div> -->

                    <input type="hidden" name="id" value="<?php echo $_GET['editid']; ?>">
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="update">Update</button>
                    </div>
                    
                  </form>
                  <br>
                <?php } ?>
            <!-- response update Records  -->
            <?php 
            if(isset($_GET['sm'])){
              ?>
              <div class="alert alert-success" role="alert">
                <?php echo $_GET['sm']; ?>
              </div>
            <?php } ?> 
                  <!--  Responce For change ther username -->
                  <?php if(isset($_GET['em'])){?>
                  <div class="alert alert-danger text-center" role="alert">
                      <?php echo $_GET['em'];?>
                  </div>
                  <?php } ?>
                </div>
              </div>

              

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

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