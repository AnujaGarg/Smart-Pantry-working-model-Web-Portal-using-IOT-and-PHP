<!DOCTYPE html>
<html>
<title>Smart Pantry - Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">SMART PANTRY</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="download.png" class="w3-circle w3-margin-right" style="width:48px;height:48px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span><h5>Welcome, <strong>Anuja</strong></h5></strong></span>
      
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Menu</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="fetch.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-home fa-fw"></i>  Dashboard</a>
    <a href="stats.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Stats</a>
    <a href="orderhistory.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-history fa-fw"></i>  Order History</a>
   <!-- <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Geo</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Orders</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  News</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  General</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>-->
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i>MyPantry</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">


  
      
    <?php
    $con=mysqli_connect("localhost","root","","pantry");
    //Check connection
    if(mysqli_connect_errno())
    {
      echo"Failed to connect to MySQL: ".mysqli_connect_errno();
    }
    /*$sql="select weight from weight_table order by serial_no desc limit 1";
    $w=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($w))
    {
      $weig=$row['weight'];
    }*/
    $sql="select time_date,product_name,product_id,order_quantity from order_table order by order_no desc limit 30";
    $use=mysqli_query($con,$sql);
    $i=0;
    while($row=mysqli_fetch_assoc($use))
    {
      $use_q[$i]=$row['order_quantity'];
      $use_t[$i]=$row['time_date'];
      $use_n[$i]=$row['product_name'];
      $use_id[$i]=$row['product_id'];
      $i++;
    }
  ?>

  </div>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <!--<div class="w3-twothird">-->
        <h5><strong><center>ORDER STATISTICS</center></strong></h5><br>

        <table class="w3-table w3-striped w3-white">
        <tr><td></td><td><strong>Name of Grocery</strong></td><td><strong>Quantity of Grocery</strong></td><td><strong>Timestamp when Added to cart</strong></td></tr>
        <?php
         $i=0;
          foreach($use_q as $value)
          {
            if($use_id[$i]=='PAN1')
            {
              $image_path="potato-icon-vector-112314792.jpg";
            }
            elseif ($use_id[$i]=='PAN2') 
            {
              $image_path="onion-icon-in-flat-style-on-white-background-vector-9917599.jpg";
            }
            elseif ($use_id[$i]=='PAN3') 
            {
              $image_path="carrot-flat-icon-vegetable-and-diet-vector-15365573.jpg";
            }
            elseif ($use_id[$i]=='PAN4') 
            {
              $image_path="fresh-tomatoes-isolated-icon-vector-19172926.jpg";
            }
            echo '<tr>
            <td><img src='."$image_path".' class="w3-circle w3-margin-right" style="width:38px;height:38px"></td>
            <td>'."$use_n[$i]".'</td>
            <td>'."$value grams".'</td>
            <td>'."$use_t[$i]".'</td>
            </tr>';
            $i++;
          }
        ?>
            
        </table>
      <!--</div>-->
    </div>
  </div>
<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
