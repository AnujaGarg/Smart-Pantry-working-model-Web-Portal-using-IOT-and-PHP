  <?php 
  date_default_timezone_set('Asia/Kolkata');
      $time_date=date("Y-m-d H:i:s");
      echo "<script type='text/javascript'>window.open('https://www.amazon.in/gp/aws/cart/add.html?ASIN.1=B07G48BP2T&Quantity.1=2','_blank');</script>";
      $con=mysqli_connect("localhost","root","","pantry");
      $sql="insert into order_table(product_id,product_name,time_date,order_quantity)value('PAN4','Tomato','$time_date','2')";
      $use=mysqli_query($con,$sql);
      //header("https://www.amazon.in/gp/aws/cart/add.html?ASIN.1=B07G48BP2T&Quantity.1=2"); 
    echo '<script>window.close();</script>';
      ?>