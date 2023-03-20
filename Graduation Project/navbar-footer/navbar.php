<?php
@session_start();
include "class/mastermenu.class.php";
include_once "class/Masterdormitory.class.php";
$mastermenu = new Mastermenu(); // class of menu
// select data menu from database
$data = $mastermenu->selectData("mastermenu"); // data of menu

$dormsDropMenu = new Masterdormitory(); // class of dorms
$dataDropMenu = $dormsDropMenu->selectData("masterdormitory"); // data of dorms

?>

<nav class="navbar navbar-expand-lg sticky-top">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img
            class="img-fluid text-white-50"
            src="images/Footerlogo.png"
            alt=""
          />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#main"
          aria-controls="main"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="main">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

            <?php foreach($data as $menu){ 
                  if($menu['master_menu_dropmenu'] == 0 && $menu['isActive'] == 1){   ?>

          <li class="nav-item">
              <a
                class="nav-link p-2 p-lg-3 <?php $mastermenu->setActive($pageTitle, $menu['master_menu_id']);?>"
                aria-current="page"
                href="<?php echo $menu['master_menu_url_link'];?>">
                <?php echo $menu['master_menu_name'];?></a
              >
            </li>
            <?php } //End if
            elseif($menu['master_menu_dropmenu'] == 1 && $menu['isActive'] == 1){ // dropdown menu ?>

            <li class="nav-item">
              <div class="dropdown">
                <a
                  class="dropdown-toggle nav-link p-2 p-lg-3  <?php $mastermenu->setActive($pageTitle, $menu['master_menu_id']);?>"
                  href="#"
                  role="button"
                  id="dropdownMenuLink"
                  data-bs-toggle="dropdown"
                  aria-expanded="false">                
                <?php echo $menu['master_menu_name'];?>

                </a>
                   <!-- un complete the item of the dropdown menu -->

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <?php foreach($dataDropMenu as $dorms) { 
                        if($dorms['isInternational'] == 0 && $dorms['isActive'] == 1){ ?> <!-- inner dorms -->
                  <li>
                    <a class="dropdown-item" href="<?php echo $dorms['master_domitory_link_url']; ?>?id=<?php echo $dorms['master_domitory_id']; ?>"
                      > <?php echo $dorms['master_domitory_name']; ?>
                    </a>
                  </li>
                  <?php }}
                  foreach($dataDropMenu as $dorms) { 

                    if($dorms['isInternational'] == 1 && $dorms['isActive'] == 1){ ?><!-- International dorms -->
                    
                  <li>
                    <a class="dropdown-item" href="<?php echo $dorms['master_domitory_link_url']; ?>?id=<?php echo $dorms['master_domitory_id']; ?>">
                     <?php echo $dorms['master_domitory_name']; ?>
                    </a>
                  </li>
                  <li>
                    <?php } 
                     } ?>
                    
                </ul>
              </div>
            </li>
            

            <?php } //End else ?>

            <?php } // End foreach?>

          <!-- <li class="nav-item">
              <a
                class="nav-link p-2 p-lg-3 active"
                aria-current="page"
                href="home.php"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link p-2 p-lg-3" href="contactUs.php"
                >Contact Us</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link p-2 p-lg-3" href="#"
                ><i class="fa-regular fa-bell fa-2x"></i
              ></a>
            </li>
            -->
          </ul> 
          <?php if(isset($_SESSION['id'])) {?>
          <a class="btn rounded-pill main-btn" href="endSession.php">Logout</a>
          <?php } else{ ?>
          <a class="btn rounded-pill main-btn" href="endSession.php">Login</a>
          <?php } ?>
        </div>
      </div>
    </nav>
    