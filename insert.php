<?php
echo "anuja";

$con=mysqli_connect("localhost","root","","pantry");
//Check connection
if(mysqli_connect_errno())
{
	echo"Failed to connect to MySQL: ".mysqli_connect_errno();
}
$product_id=$_GET['product_id'];
$weight=$_GET['weight'];
date_default_timezone_set('Asia/Kolkata');
$time_date=date('Y-m-d H:i:s');
//$time_date=$_GET[time_date];
$sql="insert into weight_table(product_id,weight,time_date)value('$product_id','$weight','$time_date')";
mysqli_query($con,$sql);

if($weight<200)
{
	//header('Location:https://www.amazon.in/gp/aws/cart/add.html?ASIN.1=B07G45ZJD9&Quantity.1=2');
	$con=mysqli_connect("localhost","root","","pantry");

	$sql="select product_details.product_name from weight_table inner join product_details on product_details.product_id=weight_table.product_id order by serial_no desc limit 1";
	$p_name=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($p_name);
	$product_name=$row['product_name'];
    if($product_id=="PAN1")
    {
    	echo "<script type='text/javascript'>window.open('https://www.amazon.in/gp/aws/cart/add.html?ASIN.1=B07G45ZJD9&Quantity.1=2','_blank');</script>";
    }
    elseif($product_id=="PAN2")
    {
    	echo "<script type='text/javascript'>window.open('https://www.amazon.in/gp/aws/cart/add.html?ASIN.3=B07G4543VV&Quantity.3=2','_blank');</script>";
    }
    elseif($product_id=="PAN3")
    {
    	echo "<script type='text/javascript'>window.open('https://www.amazon.in/gp/aws/cart/add.html?ASIN.2=B07G48T1YM&Quantity.2=2','_blank');</script>";
    }
    elseif($product_id=="PAN4")
    {
    	echo "<script type='text/javascript'>window.open('https://www.amazon.in/gp/aws/cart/add.html?ASIN.1=B07G48BP2T&Quantity.1=2','_blank');</script>";
    }

	$sql="insert into order_table(product_id,product_name,time_date,order_quantity)value('$product_id','$product_name','$time_date','2')";
    $use=mysqli_query($con,$sql);
}

//http://localhost/smart_pantry/insert.php?product_id=PAN3&weight=100  
//-> URL for calling insert.php
?>

