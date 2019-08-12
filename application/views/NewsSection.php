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
      News Section
  </div>

   <div class = "container">
      <div class = "row">
         <div style = "text-align:center;" class = "col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
         <form action="<?php echo site_url(); ?>/Main/show_all_news">
            <button style = "background-color: #A64AC9;" class = "button" type="submit">All News</button>
         </form>
         </div>
         <div style = "text-align:center;" class = "col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <form action="<?php echo site_url(); ?>/Main/show_add_news">
               <button style = "background-color: #FCCD04;" class = "button" type="submit">Add News</button>
            </form>
         </div>
      </div>
   </div>

</body>
</html>
