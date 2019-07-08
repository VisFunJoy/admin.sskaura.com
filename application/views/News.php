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
   <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>

</head>

<body>
  <!-- Include Navbar -->
  <?php include_once("Common/Navbar.php"); ?>

  <div class = "heading">
      Add News Here
  </div>

  <div style = "padding: 30px; margin: 30px auto;" class = "container">
      <div class = "row">
         <div class = "col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h5>
               1. Enter Title of news here(max 266 characters):
            </h5>
         </div>
         <div class = "col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <input autocomplete="off" class = "input-box" style = "margin:10px auto; width: 400px;" placeholder = "News Title" type="text" name="news_title"><br>
         </div>
      </div>
      <hr>
      <div class = "row">
         <div class = "col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h5>
               2. Enter description of here:
            </h5>
         </div>
         <div class = "col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <textarea cols="80" id="edi" name="editor1" rows="10"></textarea>
            <script>
               CKEDITOR.replace('edi');
            </script>          
         </div>
      </div>
  </div>
</body>
</html>
