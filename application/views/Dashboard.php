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
<?php include_once('Common/Navbar.php'); ?>

<!-- Content -->
<div class = "heading">
   Contact Messages
</div>

<div class = "container">
   <?php if ($all_contact_messages_for_particular_page == false): ?>
      <div style = "text-align:center;margin: 40px;">
         <h4  style = "color: gray;">
            Sorry, No messages yet.......
         </h4>
      </div>
   <?php else: ?>
      <?php foreach($all_contact_messages_for_particular_page as $single_contact_message): ?>
            <div class = "single-news">
               <div class = "row">
                  <div style = "text-align:center;" class = "col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                     <h3 style = "border-bottom:2px solid #FCCD04;color: #A64AC9;text-align:center; margin-bottom: 30px;">
                        <b>Subject : </b><?php echo $single_contact_message['subject'] ?>
                     </h3>
                     <div style = "color: gray; margin : 20px;">
                        <b>Sent On : </b><?php echo date('d/m/Y H:i:s', $single_contact_message['created_at']); ?><br><br>
                        <b>Sent By : </b><?php echo $single_contact_message['name'] ?><br><br>
                        <b>Email-Address : </b><?php echo $single_contact_message['email_address'] ?>
                     </div>
                  </div>
                  <div style = "text-align:center;" class = "col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                     <p>
                        <?php echo $single_contact_message['message'] ?>
                     </p>
                  </div>
               </div>
            </div>
      <?php endforeach; ?>
   <?php endif; ?>
</div>

<?php echo $links; ?>

</body>
</html>