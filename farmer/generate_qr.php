
<?php
require_once 'phpqrcode/qrlib.php';
include('authentication.php');
include('includes/header.php');


// Retrieve the username and password from the database
if(isset($_SESSION['auth_user'])) 
$currentUSER = $_SESSION['auth_user']['user_id'];

$query = "SELECT `qrcode` FROM `farmer` WHERE user_id=$currentUSER";
$result = $con->query($query);
$row = $result->fetch_assoc();
$username = $row["qrcode"];



// Close the MySQL connection
$con->close();

$fileName = 'qr-code.png';
$saveTo = 'qr-code.png';

$size = 10; // increase the size of the QR code
QRcode::png($username, $saveTo, QR_ECLEVEL_L, $size);
?>

<div class="container-fluid">
<ol class="breadcrumb mb-4">    
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">Generate QR Code</li>
</ol>
    <div class="col-md-12 mb-3">
        <h3 class="text-center mb 3"><a href="qr-code.png" download>Download QR Code</a></h3>
    </div>
</div>

<?php
 include('includes/footer.php');

 ?>