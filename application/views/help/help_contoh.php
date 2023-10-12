
<!DOCTYPE html>
<html lang="id">
<head>
<title><?php echo $title?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url("assets/css/w3.css")?>">
<link href='https://fonts.googleapis.com/css?family=RobotoDraft' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><style>
html,body,h1,h2,h3,h4,h5 {font-family: "-apple-system","BlinkMacSystemFont","San Francisco","Segoe UI",Roboto,"Helvetica Neue","sans-serif"}
.w3-bar-block .w3-bar-item {padding: 8px}
</style>
</head>
<body>

<!-- Side Navigation -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-white w3-animate-left w3-card" style="z-index:3;width:250px;" id="mySidebar">
  <a href="<?php echo base_url("panduan")?>" class="w3-bar-item w3-button w3-border-bottom"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
  <?php 
    foreach ($panduan as $m) :
      echo '<a href="#'.$m->id.'" class="w3-bar-item w3-button">'.$m->judul.'</a>';
    endforeach; 
  ?>
</nav>


<!-- Overlay effect when opening the side navigation on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Close Sidemenu" id="myOverlay"></div>

<!-- Page content -->
<div class="w3-main" style="margin-left:250px;">
<i class="fa fa-bars w3-button w3-white w3-hide-large w3-xlarge w3-margin-left w3-margin-top" onclick="w3_open()"></i>

<div class="w3-container">
  <br>
  <h5 class="w3-opacity"><?php echo $title?></h5>
  <?php 
    foreach ($panduan as $m) :
      echo '<div clas="w3-row" id="'.$m->id.'">';
      echo '<h4><i class="fa fa-clock-o"></i> '.$m->judul.'</h4>';
      echo '<p>'.$m->isi.'</p>';
      echo '</div>';
      echo '<div style="clear:both"></div><hr>';
    endforeach; 
  ?>
</div>

     
</div>

<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

</script>

<script>
</script>

</body>
</html> 