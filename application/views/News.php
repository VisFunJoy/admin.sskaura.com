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
      Add News Here
  </div>

<form action="<?php echo site_url(); ?>/Main/add_news" method = "Post" onsubmit = "return check_ckeditor_not_null()">
   <div style = "padding: 30px; margin: 30px auto;" class = "container">
         <div class = "row">
            <div class = "col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
               <h5>
                  1. Enter Title of news here(max 266 characters):
               </h5>
            </div>
            <div class = "col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
               <input required autocomplete="off" class = "input-box" style = "margin:10px auto; width: 400px;" placeholder = "News Title" type="text" name="news_title"><br>
            </div>
         </div>

         <hr>
         <div class = "row">
            <div class = "col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
               <h5>
                  2. Enter description of news here:
               </h5>
            </div>
            <div class = "col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
               <textarea id = "ckeditor" required name="news_description"></textarea>
               <script>
                  CKEDITOR.replace('ckeditor');
                  function check_ckeditor_not_null()
                  {
                     var ckValue = CKEDITOR.instances["ckeditor"].getData();

                     if (ckvalue == null)
                     {
                        alert('News description cannot be empty.');
                        return false;
                     }
                     else
                     {
                        alert('2nd');
                        return false;
                     }
                     alert('3rd');
                     return false;
                  }
               </script>  
            </div>
         </div>

         <hr>
         <div class = "row">
            <div class = "col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
               <h5>
                  2. Select image for news here:
               </h5>
            </div>
            <div class = "col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
               <input required type="file" name="news_pic" accept="image/*">       
            </div>
         </div>
         <div class = "row">
            <button type = "submit" class = "button">
               Add News
            </button>
         </div>
         <?php if (isset($message)): ?>
               <h4><?php echo $message; ?></h4>
         <?php endif; ?>
   </div>
</form>
</body>
</html>
