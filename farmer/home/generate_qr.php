
<?php
  require_once '../../assets/phpqrcode/qrlib.php';
  include('../includes/header.php');

  // Retrieve the username and password from the database
  if(isset($_SESSION['auth_user']))
  $currentUSER = $_SESSION['auth_user']['user_id'];

  $query = "SELECT * FROM `user` WHERE user_id=$currentUSER";
  $result = $con->query($query);
  $row = $result->fetch_assoc();
  $username = $row["qrcode"];

  // Close the MySQL connection
  $con->close();

  $fileName = '../../assets/img/system/qr-code.png';
  $saveTo = '../../assets/img/system/qr-code.png';

  $size = 10; // increase the size of the QR code
  QRcode::png($username, $saveTo, QR_ECLEVEL_L, $size);
?>

<ol class="breadcrumb mb-4">    
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">Generate QR Code</li>
</ol>
<div class="col-md-12 mb-3 text-center">
  <h3 class="text-center mb 3"><a href="<?php echo base_url ?>assets/img/system/qr-code.png" download>Download QR Code</a></h3>
  <a href="<?php echo base_url ?>assets/img/system/qr-code.png" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="FARMER: <?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['suffix']; ?>">
    <img class="zoom img-fluid img-bordered-sm" src="<?php echo base_url ?>assets/img/system/qr-code.png" alt="image" style="max-width: 250px; object-fit: cover; margin-bottom:-2.5rem;">
  </a>
</div>

<?php include('../includes/footer.php'); ?>