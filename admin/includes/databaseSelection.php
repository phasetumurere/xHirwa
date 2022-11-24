<?php

$query="SELECT * FROM users WHERE user_role = 'client'";
$clients=mysqli_query($connect,$query);
$clientNum=mysqli_num_rows($clients);    

$query="SELECT * FROM users WHERE user_role = 'Admin'";
$admins=mysqli_query($connect,$query);
$adminNum=mysqli_num_rows($admins); 

$query="SELECT * FROM comments WHERE comment_status = 'Approved'";
$approvedComments=mysqli_query($connect,$query);
$approvedCommentsNum=mysqli_num_rows($approvedComments); 

$query="SELECT * FROM comments WHERE comment_status = 'unApproved'";
$unApprovedComments=mysqli_query($connect,$query);
$unApprovedCommentsNum=mysqli_num_rows($unApprovedComments); 

$query="SELECT * FROM chart";
$cartedProduct=mysqli_query($connect,$query);
$cartedProductNum=mysqli_num_rows($cartedProduct); 

$query="SELECT * FROM commodity WHERE commodity_category = 'protein'";
$protein=mysqli_query($connect,$query);
$proteinsNum=mysqli_num_rows($protein); 

$query="SELECT * FROM commodity WHERE commodity_category = 'fruit'";
$fruits=mysqli_query($connect,$query);
$fruitsNum=mysqli_num_rows($fruits); 

$query="SELECT * FROM commodity WHERE commodity_category = 'vegetables'";
$vegetables=mysqli_query($connect,$query);
$vegetablesNum=mysqli_num_rows($vegetables); 

$query="SELECT * FROM commodity WHERE commodity_category = 'others'";
$others=mysqli_query($connect,$query);
$othersNum=mysqli_num_rows($others); 

?>