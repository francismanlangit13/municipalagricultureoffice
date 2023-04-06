<?php
require_once 'phpqrcode/qrlib.php';
include('authentication.php');
include('includes/header.php'); ?>

<div class="col-lg-12 mb-3 mt-3">
<ol class="breadcrumb mb-4">    
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">Generate Report</li>
</ol>
<div class="row justify-content-center align-items-center">
  <h2>GENERATE REPORT</h2>
</div>

<div class="row justify-content-center mt-4">
<div class="col-md-4 mb-3 text-center">

<a href="generatemyrequest.php"  target="_blank" class="btn btn-primary" role="button">Generate My Request</a>
</div>

<div class="col-md-4 mb-3 text-center">
<a href="generatemyreport.php"  target="_blank" class="btn btn-info">Generate My Report</a>
</div>

<div class="col-md-4 mb-3 text-center">
<a href="generatemyconcern.php" target="_blank"  class="btn btn-success">Generate My Concern</a>

</div>

</div>

</div>


<?php include('includes/footer.php'); ?>