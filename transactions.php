<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="customer.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</head>
<body>
   <div class="header">    <a href="index.html">Home</a>
<a href="customers.php">customers</a></div>

</body>
</html>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="customers";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die("failed");
}
echo '<table>
<tr>
<th>Sender\'s Name</th>
<th>Receiver\'s Name</th>
<th>Date of Transaction</th>
<th>Amount</th></tr>
';
$sender=$_POST['sender'];
$receiver=$_POST['receiver'];
$dt = date('Y-m-d');
$amount=$_POST['amount'];
if($amount!=0){
$q="INSERT INTO dummy (sender,receiver,transferDate,amount) VALUES('$sender','$receiver','$dt','$amount')";
if(mysqli_query($conn,$q)){
echo '<script>alert("transaction successful");</script>';

$q1="UPDATE customer set balance=balance-$amount WHERE customer.name='$sender'";
$q2="UPDATE customer set balance=balance+$amount WHERE customer.name='$receiver'";
// $r1=mysqli_query($conn,$q1);
// $r2=mysqli_query($conn,$q2);
if (mysqli_query($conn, $q1) and mysqli_query($conn,$q2)) {
    echo "<script>alert('Record updated successfully')</script>";
  } else {
    echo "<script>alert('Error updating record: " . mysqli_error($conn)."')</script>";
  }

}}



$sql='SELECT sender,receiver,transferDate,amount FROM dummy';
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result))
{
echo "<tr><td>".$row["sender"]."</td>
<td>".$row["receiver"]."</td>
<td>".$row["transferDate"]."</td>
<td>".$row["amount"]."</td></tr>";
}
echo "</table>";



?>
