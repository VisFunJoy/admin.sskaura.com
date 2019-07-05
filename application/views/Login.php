<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<head>

	<!-- Include common files -->
   <?php include_once("Common/CommonHeaderFiles.php"); ?>

   <!-- Include Css Files -->
   <link rel="stylesheet" href="<?php echo base_url();; ?>/Dependencies/Css/Global.css">
   <link rel="stylesheet" href="<?php echo base_url();; ?>/Dependencies/Css/Login.css">

</head>

<body>
   <div style = "margin:0px; padding:0px; max-width:100%;height:100%;" class="container">
      <div style = "margin:0px; padding:0px;max-width:100%;height:100%;" class = "row">
         <div class = "login-box-image d-none d-md-block col-md-6 col-lg-6 col-xl-6">

         </div>
         <div class = "login-box-content col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h3 style = "margin-top:50px;"><b>Welcome</b></h3>
            <img style = "margin : 20px auto; border-radius : 50%;" src="<?php echo base_url(); ?>/Dependencies/Images/sskaura25.jpg" alt="My Image"/>
            <form action="<?php echo base_url(); ?>/Main/dashboard">
               <input class = "login-input-box" style = "margin:10px auto;" placeholder = "User Name" type="text" name="username"><br>
               <input class = "login-input-box" style = "margin:10px auto;" placeholder = "Password" type="text" name="password"><br>
               <button class = "login-button" type="submit">Login</button>
            </form>
         </div>
      </div>
   </div>
</body>
</html>