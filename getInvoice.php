
<?php include "includes/connect.php";

use Mpdf\Tag\Table;


require_once __DIR__ . "/vendor/autoload.php";

// Grab the variables
session_start();
$firstName=$_SESSION['first_name'];
$lastName=$_SESSION['last_name'];
$username=$_SESSION['username'];
$email=$_SESSION['email'];
// $productName=$_SESSION['username'];
$phone=$_SESSION['phone_number'];
$gender=$_SESSION['user_gender'];
if($gender=='M'){
    $title="Mr";
}elseif($gender=='F'){
    $title="Mrs";
}
$query="SELECT * FROM chart WHERE email = '$email'";
$likedProducts=mysqli_query($connect,$query);

$sum="SELECT sum(product_amount) FROM chart WHERE email = '$email'";
$tot=mysqli_query($connect,$sum);
$row=mysqli_fetch_array($tot);
$total=$row[0];
// create new PDF Instance
$mpdf=new \Mpdf\Mpdf();
// Create our PDF

$data='';
$data.="<h1>Your Invoice</h1>";
$data.="<strong>First Name: </strong>".$firstName."<br>";
$data.="<strong>Last Name: </strong>".$lastName."<br>";
$data.="<strong>User Name: </strong>".$username."<br>";
$data.="<strong>Phone Number: </strong>".'0'.$phone."<br>";
$data.="<strong>Your Email: </strong>".$email."<br>"."<br>"."<br>";

$data.="<h1>Product Information</h1>";

// $data.="<b>Name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Quantity &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Price </b>";
$data.="<table width='50%' border='1' cellspacing='0'>
 <tr>

 <th width='120'>Name</th>
 <th width='120'>Quantity</th>
 <th width='120'>Unit Price</th>
 <th width='120'>Amount</th>


 </tr>
 </Table>";

while($row=mysqli_fetch_assoc($likedProducts)){
    $productNames=$row['product_name'];
    $productprices=$row['product_price'];
    $productQuantity=$row['quantity'];
    $productAmount=$row['product_amount'];
    

$data.="<table width='50%' border='1' cellspacing='0'>
<tr>
<td width='120'>$productNames</td>
<td width='120'>$productQuantity</td>
<td width='120'>$productprices</td>
<td width='120'>$productAmount</td>

</tr>
</table>  ";
}
$data.="
<table width=50% border='1' cellspacing='0'>

<tr>
<td width='360' ><b>Total</b></td>
<td width='120'><b>$total</b></td>
</tr>

</table>";

$data.="<br>Please send $total Rwf to our MOMO 0785309380 we are about to reach to you with your products";
$data.="<br><br>And Thank you very much for shopping with xHirwa $title <b>$username</b>🙏";
// Write PDF

$mpdf->WriteHTML($data);

// Output in the browser

$mpdf->Output("$username Invoice.pdf","D"); //For auto download we remove .pdf

?>
 