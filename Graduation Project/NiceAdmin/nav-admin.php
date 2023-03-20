<?php
@session_start();
include_once "../class/Notification.class.php";
include_once "../class/Student.class.php";

$noti = new Notification();
$data = $noti->getNotifications(); // get data for notification

$dataInternational = $noti->getNotificationsisInnter(1); // get data for notification inernational
$dataInner = $noti->getNotificationsisInnter(0); // get data for notification inner


$std = new Student();
$admin_info = $std->getAdminInfo($_SESSION['id']);

$isInternationl = $noti->getIsInternationalFromStudent($_SESSION['id']);
?>
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
         
        <?php if(isset($_SESSION['id']) && $_SESSION['id'] == "Admin"){ ?>

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <?php if(count($data)){?>
                <span class="badge bg-primary badge-number"><?= count($data);?></span>
            <?php }?>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have <?= count($data);?> new notifications
              <a href="notification.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <?php foreach($data as $k => $val) {?>
            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <p><?= substr($val['message'], 0,20);?> ...</p>
                <p><?= date('Y-m-d, H:i', strtotime($val['created_at']))?></p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <?php }?>

            <?php }elseif($isInternationl[0]['isInternational'] == 1){?> <!-- for internationa-->

                      <li class="nav-item dropdown">

                      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <?php if(count($dataInternational)){?>
                            <span class="badge bg-primary badge-number"><?= count($dataInternational);?></span>
                        <?php }?>
                      </a><!-- End Notification Icon -->

                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                          You have <?= count($dataInternational);?> new notifications
                          <a href="notification.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
                        <?php foreach($dataInternational as $k => $val) {?>
                        <li class="notification-item">
                          <i class="bi bi-info-circle text-primary"></i>
                          <div>
                            <p><?= substr($val['message'], 0,20);?> ...</p>
                            <p><?= date('Y-m-d, H:i', strtotime($val['created_at']))?></p>
                          </div>
                        </li>

                        <li>
                          <hr class="dropdown-divider">
                        </li>
                        <?php }?>

                    <?php }else{?>  <!-- for inner-->
              <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                  <i class="bi bi-bell"></i>
                  <?php if(count($dataInner)){?>
                      <span class="badge bg-primary badge-number"><?= count($dataInner);?></span>
                  <?php }?>
                </a><!-- End Notification Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                  <li class="dropdown-header">
                    You have <?= count($dataInner);?> new notifications
                    <a href="notification.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <?php foreach($dataInner as $k => $val) {?>
                  <li class="notification-item">
                    <i class="bi bi-info-circle text-primary"></i>
                    <div>
                      <p><?= substr($val['message'], 0,20);?> ...</p>
                      <p><?= date('Y-m-d, H:i', strtotime($val['created_at']))?></p>
                    </div>
                  </li>

                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <?php }?>


            <?php }?>

            <li class="dropdown-footer">
              <a href="notification.php">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->



        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="image_admin/<?php echo $admin_info['image'];?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo substr($admin_info['Fname'], 0, 1) . "." . $admin_info['Lname'];;?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $admin_info['Fname'] . " " . $admin_info['Lname'];?></h6>
              <span>
              <? //if($isInternationl[0]['isInternational'] == 1){?>
                  <!-- Internatianl Admin -->
                <?//} elseif($isInternationl[0]['isInternational'] == 0){ ?>
                <!-- Inner Admin -->
                <? //}else ?>
                Admin

              </span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-editProfile-admin.php?editid=<?php echo $_SESSION['id']; ?>">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            
            <li>
              <a class="dropdown-item d-flex align-items-center" href="endSessionAdmin.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
