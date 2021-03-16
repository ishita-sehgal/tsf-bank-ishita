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
    
   <div class="header"> <a href="index.html">Home</a>
<a href="history.php">Transaction History</a></div></body>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="customers";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die("failed");
}
$sql = "SELECT id,email,balance,customer.name FROM customer";
$result=mysqli_query($conn,$sql);
echo 
"
<table> 
    <tr>
    <th>S.NO</th>
    <th>Customer Name</th>
    <th>Email</th>
    <th>Balance($)</th></tr>
    ";
while($row = mysqli_fetch_assoc($result))
{
echo "<tr><td>".$row["id"]."</td>
<td>".$row["name"]."</td>
<td>".$row["email"]."</td>
<td>".$row["balance"]."</td></tr>";
}
echo "</table>";
mysqli_close($conn);
?>
<body>

    <!-- Button to open the modal login form -->
<div class="container">
    <button class="btn btn-dark btn-lg" onclick="document.getElementById('id01').style.display='block'">Transfer Money</button>
</div>
<!-- The Modal -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'"
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" action="transactions.php" method="POST">
<label for="sender"><b>Sender's Name</b></label>
      <input type="text" placeholder="Enter Sender's Name" name="sender" required>
<label for="receiver"><b>Receiver's Name</b></label>
      <input type="text" placeholder="Enter Receiver's Name" name="receiver" required>
<label for="amount"><b>Amount</b></label>
      <input type="number" placeholder="Amount" name="amount" required>
<div class="container">
    <input type="submit" name="submit" value="Transfer" class="btn btn-dark btn-lg">
<div>
  

</form>
</div>



</body>
</html>