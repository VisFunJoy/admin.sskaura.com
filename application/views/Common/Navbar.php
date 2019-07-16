<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <a class="navbar-brand" href="<?php echo site_url(); ?>/Main/dashboard">
      Admin Panel
      <img width = "70" height = "50" src="<?php echo base_url(); ?>Dependencies/Images/sskaura25.jpg" alt="My Image"/>
   </a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
         <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url(); ?>/Main/load_dashboard">Dashboard <span class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url(); ?>/Main/load_news">News section</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url(); ?>/Main/logout">Logout</a>
         </li>
      </ul>
   </div>
</nav>