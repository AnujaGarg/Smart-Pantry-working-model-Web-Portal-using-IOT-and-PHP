<?php
$con=mysqli_connect('localhost','root','','pantry');
$sql='alter table order_table add foreign key(product_id) references product_details(product_id)';
mysqli_query($con,$sql);?>