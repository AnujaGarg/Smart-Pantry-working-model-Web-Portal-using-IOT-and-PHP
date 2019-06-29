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

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  font:bold;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
  width:100%;
}
.button:active {
  transform: translateY(4px);
  }

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid ;
}

.button1:hover {
  color: white;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid ;
}

.button2:hover {
  color: white;
}

.button3 {
  background-color: white; 
  color: black; 
  border: 2px solid teal;
}

.button3:hover {
  color: white;
}

.button4 {
  background-color: white;
  color: black;
  border: 2px solid ;
}

.button4:hover {
  color: white;
}
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
    <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-home fa-fw"></i>  Dashboard</a>
    <a href="stats.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Stats</a>
    <a href="orderhistory.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  Order History</a>
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
    <h7><br></h7>
  </header>

<?php
    $con=mysqli_connect("localhost","root","","pantry");
    //Check connection
    if(mysqli_connect_errno())
    {
      echo"Failed to connect to MySQL: ".mysqli_connect_errno();
    }
    $sql="select weight from weight_table where product_id='PAN1' order by serial_no desc limit 1 ";
    $w=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($w);
    $potato_w=$row['weight'];

    $sql="select weight from weight_table where product_id='PAN2' order by serial_no desc limit 1 ";
    $w=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($w);
    $onion_w=$row['weight'];

    $sql="select weight from weight_table where product_id='PAN3' order by serial_no desc limit 1 ";
    $w=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($w);
    $carrot_w=$row['weight'];

    $sql="select weight from weight_table where product_id='PAN4' order by serial_no desc limit 1 ";
    $w=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($w);
    $tomato_w=$row['weight'];
    //while($row=mysqli_fetch_assoc($w))
    //{
      //$weig=$row['weight'];
    //}
    /*$sql="select weight_table.weight,weight_table.time_date,product_details.product_name,weight_table.product_id from weight_table inner join product_details on product_details.product_id=weight_table.product_id order by serial_no desc limit 30";
    $use=mysqli_query($con,$sql);
    $i=0;
    while($row=mysqli_fetch_assoc($use))
    {
      $use_w[$i]=$row['weight'];
      $use_t[$i]=$row['time_date'];
      $use_n[$i]=$row['product_name'];
      $use_id[$i]=$row['product_id'];
      $i++;
    }*/
    $sql="select time_date,product_name,product_id,order_quantity from order_table order by order_no desc limit 5";
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

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <img src="tomato-basket-fake_1003_detail.jpg" style="width: 100%;height:200px;object-fit:cover;">
      <div class="w3-container w3-red w3-padding-16 ">
        <div class="w3-left"><h6>Current Weight: </h6></div>
        <div class="w3-right">
          <h5><?=$tomato_w?> grams</h5>
        </div>
        <div class="w3-clear"></div>
        <h4>Tomatoes</h4>
      </div>
      <a href = "tomatofn.php" target="_blank" class="button w3-border-red w3-hover-red button1">Order Now</a>
    </div>
    <div class="w3-quarter">
      <img src="D1089_98_642_1200.jpg" style="width: 100%;height:200px;object-fit:cover;">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><h6>Current Weight: </h6></div>
        <div class="w3-right">
          <h5><?=$carrot_w?> grams</h5>
        </div>
        <div class="w3-clear"></div>
        <h4>Carrot</h4>
      </div>
      <a href="carrotfn.php" target="_blank" class="button w3-hover-blue w3-border-blue button2">Order Now</a>
    </div>
    <div class="w3-quarter">
      <img src="sugar-tools-maine-handmade-onion-baskets.jpg" style="width: 100%;height:200px;object-fit:cover;">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><h6>Current Weight: </h6></div>
        <div class="w3-right">
          <h5><?=$onion_w?> grams</h5>
        </div>
        <div class="w3-clear"></div>
        <h4>Onion</h4>
      </div>
      <a href="onionfn.php" target="_blank" class="button button3 w3-border-teal w3-hover-teal">Order Now</a>
    </div>
    <div class="w3-quarter">
      <img src="Golden-potatoes-in-basket.jpg" style="width: 100%;height:200px;object-fit:cover;">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><h6>Current Weight: </h6></div>
        <div class="w3-right">
          <h5><?=$potato_w?> grams</h5>
        </div>
        <div class="w3-clear"></div>
        <h4>Potato</h4>
      </div>
      <a href="potatofn.php" target="_blank" class="button button4 w3-border-orange w3-hover-orange w3-hover-text-white" >Order Now</a>
    </div>
  </div>
  <h7><br></h7>

<div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <!--<div class="w3-twothird">-->
        <h5><strong><center>RECENT ORDERS</center></strong></h5><br>

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

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">

      <!--<div class="w3-third">
        <h5> Gallery  </h5>
        <img src="KT_17_Multipurpose_Bins_R112916_1200.jpg" style="width:100%">
        <h5><br><h5>
        <img src="KT_18_Pantry_RGB.jpg" style="width:100%">
        <h5><br><h5>
        <img src="05867edf-6ee1-4748-93d9-7c7a2980878e_1.c9f69806dfbfc2c21f35ad53a3d32c07.jpeg" style="width:100%">
        <h5><br><h5>
        <img src="CF_17_10070310-ProKeeper-Containers_.jpg" style="width:100%">
      </div>
      
      <div class="w3-twothird">
        <h5><strong><center>USAGE STATISTICS</center></strong></h5>

        <table class="w3-table w3-striped w3-white">
        <tr><td></td><td><strong>Name of Grocery</strong></td><td><strong>Weight of Grocery</strong></td><td><strong>Timestamp of change in weight</strong></td></tr>
        <?php
         $i=0;
          foreach($use_w as $value)
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
            <td>'.$use_t[$i].'</td>
            </tr>';
            $i++;
          }
        ?>
            
        </table>
      </div>
    </div>
  </div>-->
  
  <hr>
  <div class="w3-container" style="display: none">
    <h5>General Stats</h5>
    <p>New Visitors</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-green" style="width:25%">+25%</div>
    </div>

    <p>New Users</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-orange" style="width:50%">50%</div>
    </div>

    <p>Bounce Rate</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-red" style="width:75%">75%</div>
    </div>
  </div>
  <hr>

  <div class="w3-container" style="display: none">
    <h5>Countries</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
      <tr>
        <td>United States</td>
        <td>65%</td>
      </tr>
      <tr>
        <td>UK</td>
        <td>15.7%</td>
      </tr>
      <tr>
        <td>Russia</td>
        <td>5.6%</td>
      </tr>
      <tr>
        <td>Spain</td>
        <td>2.1%</td>
      </tr>
      <tr>
        <td>India</td>
        <td>1.9%</td>
      </tr>
      <tr>
        <td>France</td>
        <td>1.5%</td>
      </tr>
    </table><br>
    <button class="w3-button w3-dark-grey">More Countries  <i class="fa fa-arrow-right"></i></button>
  </div>
  <hr>
  <div class="w3-container" style="display: none">
    <h5>Recent Users</h5>
    <ul class="w3-ul w3-card-4 w3-white">
      <li class="w3-padding-16">
        <img src="/w3images/avatar2.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Mike</span><br>
      </li>
      <li class="w3-padding-16">
        <img src="/w3images/avatar5.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Jill</span><br>
      </li>
      <li class="w3-padding-16">
        <img src="/w3images/avatar6.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Jane</span><br>
      </li>
    </ul>
  </div>
  <hr>

  <div class="w3-container" style="display: none">
    <h5>Recent Comments</h5>
    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <img class="w3-circle" src="/w3images/avatar3.png" style="width:96px;height:96px">
      </div>
      <div class="w3-col m10 w3-container">
        <h4>John <span class="w3-opacity w3-medium">Sep 29, 2014, 9:12 PM</span></h4>
        <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      </div>
    </div>

    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <img class="w3-circle" src="/w3images/avatar1.png" style="width:96px;height:96px">
      </div>
      <div class="w3-col m10 w3-container">
        <h4>Bo <span class="w3-opacity w3-medium">Sep 28, 2014, 10:15 PM</span></h4>
        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      </div>
    </div>
  </div>
  <br>
  <div class="w3-container w3-dark-grey w3-padding-32"style="display: none">
    <div class="w3-row">
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-green">Demographic</h5>
        <p>Language</p>
        <p>Country</p>
        <p>City</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-red">System</h5>
        <p>Browser</p>
        <p>OS</p>
        <p>More</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-orange">Target</h5>
        <p>Users</p>
        <p>Active</p>
        <p>Geo</p>
        <p>Interests</p>
      </div>
    </div>
  </div>

  <!-- Footer -->

  <!-- End page content -->
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
