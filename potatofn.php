<?php
      date_default_timezone_set('Asia/Kolkata');
      $time_date=date("Y-m-d H:i:s");
      echo "<script type='text/javascript'>window.open('https://www.amazon.in/gp/aws/cart/add.html?ASIN.4=B07G45ZJD9&Quantity.4=2','_blank');</script>";
      $con=mysqli_connect("localhost","root","","pantry");
      $sql="insert into order_table(product_id,product_name,time_date,order_quantity)value('PAN1','Potato','$time_date','2')";
      $use=mysqli_query($con,$sql);
      echo '<script>window.close()</script>';