<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<head>

	<!-- Include common files -->
   <?php include_once("Common/CommonHeaderFiles.php"); ?>

   <!-- Include Css Files -->
   <link rel="stylesheet" href="<?php echo base_url();; ?>/Dependencies/Css/Global.css">
   <link rel="stylesheet" href="<?php echo base_url();; ?>/Dependencies/Css/Main.css">

   <!-- Include Ckeditor -->
   <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
</head>

<body>
  <!-- Include Navbar -->
  <?php include_once("Common/Navbar.php"); ?>

  <div class = "heading">
      Add Message Here
  </div>

<form action="<?php echo site_url(); ?>/Main/add_message" method = "Post" onsubmit = "return check_ckeditor_not_null()">
   <div style = "padding: 30px; margin: 30px auto;" class = "container">
         <div class = "row">
            <?php if (isset($message)): ?>
               <h4 style = "color:#098AB3;"><?php echo $message; ?></h4>
            <?php endif; ?>
         </div>
      
         <div class = "row">
            <div class = "col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
               <h5>
                  1. Enter the message here:
               </h5>
            </div>
            <div class = "col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
               <textarea id = "ckeditor" required name="message"></textarea>
               <script>
                  CKEDITOR.replace('ckeditor');
                  function check_ckeditor_not_null()
                  {
                     if (CKEDITOR.instances["ckeditor"].getData() == '')
                     {
                        alert('News description cannot be empty.');
                        return false;
                     }
                     else
                     {
                        return true;
                     }
                  }
               </script>  
            </div>
         </div>

         <hr>
         <div class = "row">
            <button type = "submit" class = "button">
               Add Message
            </button>
         </div>
   </div>
</form>
</body>
</html>
