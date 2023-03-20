<?php
include_once "class/Student.class.php";
$std = new Student();

if(isset($_POST['login'])){
   $std->validationLogin($_POST);
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title> Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/styleLogin.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/styleLogin.css">
    
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>
  <body>
    <img class="wave" src="images/img/wave.png" />
    <div class="container" >
      <div class="img">
        <!-- <body>Welcome to the University of Jordan dorms System portal</body> -->
        <img src="images/img/jordan.png" style = "width: 350px; height:380px;"/>
      </div>
      <div class="login-content">

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
          <img src="images/img/beauty.png" width="150" style="height: 135px !important" />
          <p class="title" style="font-size: 18px; font-family: Serif; font-weight: bold;
                                  padding-bottom: 20px; color: #666; margin-top: 10px;">
            Welcome to the University of Jordan dorms System portal
          </p>
          <div class="input-div one">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="div">
              <input type="text" class="input" name="username" placeholder="Username" value="<?php if(isset($_GET['username']))
                                                                                                     echo $_GET['username'];?>">
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              <input type="password" class="input" placeholder="Password" name="upassword">
            </div>
          </div>
          <a href="https://adresetpw.ju.edu.jo/" target="_blank">Forgot Password?</a>
          <input type="submit" class="btn" value="Login" name="login">
           <!-- response Wrong the username or password  -->
     <?php 
            if(isset($_GET['sm'])){
              ?>
              <div style="background-color: #f8d7da; color: #842029; border-radius: 20px; border-color: #f5c2c7; margin-top: 1rem; padding: 1rem 1rem;
                          margin-bottom: 1rem; border: 1px solid transparent; font-size: 1rem; font-weight: 400; line-height: 1.5; border-radius: 0.25rem;">
                <?php echo $_GET['sm']; ?>
              </div>
            <?php } 
      ?> 
        </form>
        
      </div>
    </div>
    <br><br>
    

    
    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>
