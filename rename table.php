<?php
$con=mysqli_connect('localhost','root','','pantry');
$sql='rename table order_type to product_details';
mysqli_query($con,$sql);
?>