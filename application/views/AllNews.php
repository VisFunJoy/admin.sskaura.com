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
   All News
</div>

<div style = "padding : 50px;">
   <?php if (isset($message)): ?>
      <h4 style = "color:red;"><?php echo $message; ?></h4>
   <?php endif; ?>
</div>
<div class = "container">
   <?php if ($all_news_for_particular_page == false): ?>
      <div style = "text-align:center;margin: 40px;">
         <h4  style = "color: gray;">
            Sorry, No news yet.......
         </h4>
      </div>
   <?php else: ?>
      <?php foreach($all_news_for_particular_page as $single_news): ?>
            <div class = "single-news">
               <div class = "row">
                  <div style = "text-align:center;" class = "col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                     <h3 style = "border-bottom:2px solid #FCCD04;color: #A64AC9;text-align:center; margin-bottom: 30px;">
                        <?php echo $single_news['title'] ?>
                     </h3>
                     <div style = "color: gray; margin : 20px;">
                        <b>Posted On : </b><?php echo date('d/m/Y H:i:s', $single_news['posted_on']); ?>
                     </div>
                     <img width = "350" height= "200" src="<?php echo $single_news["image"]; ?>" alt="News Image">
                  </div>
                  <div style = "text-align:center;" class = "col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                     <form style = "margin-top:100px;" action="<?php echo site_url(); ?>/Main/delete_news/<?php echo $single_news['id']; ?>">
                        <button style = "background-color: red;" class = "button" type="submit">Delete This News</button>
                     </form>
                  </div>
               </div>
            </div>
      <?php endforeach; ?>
   <?php endif; ?>
</div>

<?php echo $links; ?>

</body>
</html>