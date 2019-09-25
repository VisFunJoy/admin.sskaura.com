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

</head>

<body>
  <!-- Include Navbar -->
  <?php include_once("Common/Navbar.php"); ?>

  <div class = "heading">
      Message
  </div>

   <div class = "container">
      <div class = "row">
        <h3>
            <?php if (isset($message)): ?>
               <h4 style = "color:gray;"><?php echo $message; ?></h4>
            <?php endif; ?>
        </h3>
      </div>
   </div>

</body>
</html>
