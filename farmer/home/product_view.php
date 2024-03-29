<?php
    include('../includes/header.php');
?>
<?php
  if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql = "SELECT *, DATE_FORMAT(product.exp_date, '%M-%d-%Y') as short_date, DATE_FORMAT(product.exp_date, '%m-%d-%Y') as short_date_exp
  FROM
  product
  INNER JOIN
  product_category
  ON 
  product.product_category_id = product_category.product_category_id
  WHERE product.product_id = $id AND product_status = 1";
  $sql_run = mysqli_query($con, $sql);
  if(mysqli_num_rows($sql_run) > 0){
      foreach($sql_run as $row){
?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
          <h5>Product information</h5>
      </div>
      <div class="card-body">
      <section id="services" class="services">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-7 _boxzoom mb-6">
              <div class="main-image" style="margin-top:-2.2rem; zoom:155%">
                <br>
                  <a href="
                    <?php
                        if(isset($row['photo'])){
                            if(!empty($row['photo'])){ 
                                echo base_url . 'assets/img/products/' . $row['photo'];
                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                    ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="PRODUCT IMAGE1">
                    <img class="zoom img-fluid img-bordered-sm" id="frame4"
                    src="
                        <?php
                            if(isset($row['photo'])){
                                if(!empty($row['photo'])) {
                                    echo base_url . 'assets/img/products/' . $row['photo'];
                            } else { echo base_url . 'assets/img/system/no-image.png'; } }
                        ?>
                    " alt="image" style="object-fit:cover; display: inline-block; margin-bottom:1rem; text-decoration:none;">
                  </a>
                <br>
              </div>
              <div class="zoom-thumb">
                <ul class="piclist">
                  <a href="
                    <?php
                        if(isset($row['photo1'])){
                            if(!empty($row['photo1'])){ 
                                echo base_url . 'assets/img/products/' . $row['photo1'];
                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                    ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="PRODUCT IMAGE2">
                    <img class="zoom img-fluid img-bordered-sm" id="frame4"
                    src="
                        <?php
                            if(isset($row['photo1'])){
                                if(!empty($row['photo1'])) {
                                    echo base_url . 'assets/img/products/' . $row['photo1'];
                            } else { echo base_url . 'assets/img/system/no-image.png'; } }
                        ?>
                    " alt="image" style="object-fit:cover; height:85px; display: inline-block; margin-bottom:1rem; text-decoration:none;">
                  </a>

                  <a href="
                    <?php
                        if(isset($row['photo2'])){
                            if(!empty($row['photo2'])){ 
                                echo base_url . 'assets/img/products/' . $row['photo2'];
                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                    ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="PRODUCT IMAGE3">
                    <img class="zoom img-fluid img-bordered-sm" id="frame4"
                    src="
                        <?php
                            if(isset($row['photo2'])){
                                if(!empty($row['photo2'])) {
                                    echo base_url . 'assets/img/products/' . $row['photo2'];
                            } else { echo base_url . 'assets/img/system/no-image.png'; } }
                        ?>
                    " alt="image" style="object-fit:cover; height:85px; display: inline-block; margin-bottom:1rem; text-decoration:none;">
                  </a>

                  <a href="
                    <?php
                        if(isset($row['photo3'])){
                            if(!empty($row['photo3'])){ 
                                echo base_url . 'assets/img/products/' . $row['photo3'];
                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                    ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="PRODUCT IMAGE4">
                    <img class="zoom img-fluid img-bordered-sm" id="frame4"
                    src="
                        <?php
                            if(isset($row['photo3'])){
                                if(!empty($row['photo3'])) {
                                    echo base_url . 'assets/img/products/' . $row['photo3'];
                            } else { echo base_url . 'assets/img/system/no-image.png'; } }
                        ?>
                    " alt="image" style="object-fit:cover; height:85px; display: inline-block; margin-bottom:1rem; text-decoration:none;">
                  </a>
                </ul>
              </div>
            </div>
            <div class="col-md-5 mb-6">
              <div class="_product-detail-content noprint-scroll">
                <p class="_p-name"> <b><?= $row['product_name']; ?></b> </p>
                <div class="_p-price-box">
                  <div class="p-list">
                    <span> <b>Stocks:</b> <?= $row['product_quantity']; ?> </span>
                    <span> <b>Category:</b> <?= $row['category_name']; ?> </span>
                    <br>
                      <b>Product status: </b>
                      <?php
                        if($row['product_quantity']>0){
                          echo "Available<span> (In Stock)</span>"; 
                        }else{
                          echo "Unavailable<span> (Out of Stock)</span>";
                        }
                      ?>
                      <br>
                      <b>Expiration Date: </b> <?= $row['short_date']; ?>
                      <?php
                        if($row['exp_date'] < date) {
                          echo "<span style='color:red'> (Expired)</span>"; 
                        }else{ }
                      ?>
                    <br><br>
                  </div>
                  <div class="_p-features">
                    <span> <b>Description About this product: </b> </span>
                    <?= $row['product_description']; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      </div>
    </div>
    <br>
      <div class="text-right">
        <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
      </div>
    <br>
  </div>
</div>
<?php
  } }
  else{
?>
  <h4>No Record Found!</h4>
<?php } } ?>

<?php include('../includes/footer.php');?>

<script>
  var fileInput1 = document.getElementById('image1');
  var label1 = document.getElementById('image1-label');
  fileInput1.addEventListener('change', function() {
    if (fileInput1.value) {
      label1.classList.add('required');
      fileInput1.required = true;
    } else {
      label1.classList.remove('required');
      fileInput1.required = false;
    }
  });

  var fileInput2 = document.getElementById('image2');
  var label2 = document.getElementById('image2-label');
  fileInput2.addEventListener('change', function() {
    if (fileInput2.value) {
      label2.classList.add('required');
      fileInput2.required = true;
    } else {
      label2.classList.remove('required');
      fileInput2.required = false;
    }
  });

  var fileInput3 = document.getElementById('image3');
  var label3 = document.getElementById('image3-label');
  fileInput3.addEventListener('change', function() {
    if (fileInput3.value) {
      label3.classList.add('required');
      fileInput3.required = true;
    } else {
      label3.classList.remove('required');
      fileInput3.required = false;
    }
  });

  var fileInput4 = document.getElementById('image4');
  var label4 = document.getElementById('image4-label');
  fileInput4.addEventListener('change', function() {
    if (fileInput4.value) {
      label4.classList.add('required');
      fileInput4.required = true;
    } else {
      label4.classList.remove('required');
      fileInput4.required = false;
    }
  });

  var fileInput5 = document.getElementById('image5');
  var label5 = document.getElementById('image5-label');
  fileInput5.addEventListener('change', function() {
    if (fileInput5.value) {
      label5.classList.add('required');
      fileInput5.required = true;
    } else {
      label5.classList.remove('required');
      fileInput5.required = false;
    }
  });

  var fileInput6 = document.getElementById('image6');
  var label6 = document.getElementById('image6-label');
  fileInput6.addEventListener('change', function() {
    if (fileInput6.value) {
      label6.classList.add('required');
      fileInput6.required = true;
    } else {
      label6.classList.remove('required');
      fileInput6.required = false;
    }
  });
</script>
<style>
.my_img {
  vertical-align: middle;
  position: absolute;
  top: 0;
  bottom: 0;
  margin: auto;
  height: 100%;
}
.piclist li {
  display: inline-block;
  width: 90px;
  height: 114px;
  border: 1px solid #eee;
}
.piclist li img {
  width: 97%;
  height: auto;
}

/* custom style */
.picZoomer-pic-wp,
.picZoomer-zoom-wp {
  border: 1px solid #eee;
}

section {
  padding: 60px 0;
}
.row-sm .col-md-6 {
  padding-left: 5px;
  padding-right: 5px;
}

/*===pic-Zoom===*/
._boxzoom .zoom-thumb {
  /* width: 90px; */
  display: inline-block;
  vertical-align: top;
  margin-top: 0px;
}
._boxzoom .zoom-thumb ul.piclist {
  padding-left: 0px;
  top: 0px;
}
@media only screen and (max-width: 1000px) {
  ._boxzoom ._product-images {
  width: 100% !important;
  display: inline-block;
  }
}
@media only screen and (max-width: 1050px) {
  ._boxzoom ._product-images {
    width: 90% !important;
    display: inline-block;
  }
}
@media only screen and (max-width: 1550px) {
  .main-image {
    max-width: 240px !important;
  }
}
@media only screen and (max-width: 5550px) {
  .main-image {
    max-width: 240px !important;
  }
}
._boxzoom ._product-images {
  width: 80%;
  display: inline-block;
}
._boxzoom ._product-images .picZoomer {
  width: 100%;
}
._boxzoom ._product-images .picZoomer .picZoomer-pic-wp img {
  left: 0px;
}
._boxzoom ._product-images .picZoomer img.my_img {
  width: 100%;
}
.piclist li img {
  height: 100px;
  object-fit: cover;
}

/*======products-details=====*/
._product-detail-content {
  padding: 15px;
  border: 1px solid lightgray;
}
._product-detail-content p._p-name {
  color: black;
  font-size: 20px;
  border-bottom: 1px solid lightgray;
  padding-bottom: 12px;
}
.p-list span {
  margin-right: 15px;
}
.p-list span.price {
  font-size: 25px;
  color: #318234;
}
._p-qty > span {
  color: black;
  margin-right: 15px;
  font-weight: 500;
}
._p-qty .value-button {
  display: inline-flex;
  border: 0px solid #ddd;
  margin: 0px;
  width: 30px;
  height: 35px;
  justify-content: center;
  align-items: center;
  background: #fd7f34;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  color: #fff;
}

._p-qty .value-button {
  border: 0px solid #fe0000;
  height: 35px;
  font-size: 20px;
  font-weight: bold;
}
._p-qty input#number {
  text-align: center;
  border: none;
  border-top: 1px solid #fe0000;
  border-bottom: 1px solid #fe0000;
  margin: 0px;
  width: 50px;
  height: 35px;
  font-size: 14px;
  box-sizing: border-box;
}
._p-add-cart {
  margin-left: 0px;
  margin-bottom: 15px;
}
.p-list {
  margin-bottom: 10px;
}
._p-features > span {
  display: block;
  font-size: 16px;
  color: #000;
  font-weight: 500;
}
._p-add-cart .buy-btn {
  background-color: #fd7f34;
  color: #fff;
}
._p-add-cart .btn {
  text-transform: capitalize;
  padding: 6px 20px;
  /* width: 200px; */
  border-radius: 52px;
}
._p-add-cart .btn {
  margin: 0px 8px;
}

/*=========Recent-post==========*/
.title_bx h3.title {
  font-size: 22px;
  text-transform: capitalize;
  position: relative;
  color: #fd7f34;
  font-weight: 700;
  line-height: 1.2em;
}
.title_bx h3.title:before {
  content: "";
  height: 2px;
  width: 20%;
  position: absolute;
  left: 0px;
  z-index: 1;
  top: 40px;
  background-color: #fd7f34;
}
.title_bx h3.title:after {
  content: "";
  height: 2px;
  width: 100%;
  position: absolute;
  left: 0px;
  top: 40px;
  background-color: #ffc107;
}
.common_wd .owl-nav .owl-prev,
.common_wd .owl-nav .owl-next {
  background-color: #fd7f34 !important;
  display: block;
  height: 30px;
  width: 30px;
  text-align: center;
  border-radius: 0px !important;
}
.owl-nav .owl-next {
  right: -10px;
}
.owl-nav .owl-prev,
.owl-nav .owl-next {
  top: 50%;
  position: absolute;
}
.common_wd .owl-nav .owl-prev i,
.common_wd .owl-nav .owl-next i {
  color: #fff;
  font-size: 14px !important;
  position: relative;
  top: -1px;
}
.common_wd .owl-nav {
  position: absolute;
  top: -21%;
  right: 4px;
  width: 65px;
}
.owl-nav .owl-prev i,
.owl-nav .owl-next i {
  left: 0px;
}
._p-qty .decrease_ {
  position: relative;
  right: -5px;
  top: 3px;
}

._p-qty .increase_ {
  position: relative;
  top: 3px;
  left: -5px;
}
/*========box========*/
.sq_box {
  padding-bottom: 5px;
  border-bottom: solid 2px #fd7f34;
  background-color: #fff;
  text-align: center;
  padding: 15px 10px;
  margin-bottom: 20px;
  border-radius: 4px;
}
.item .sq_box span.wishlist {
  right: 5px !important;
}
.sq_box span.wishlist {
  position: absolute;
  top: 10px;
  right: 20px;
}
.sq_box span {
  font-size: 14px;
  font-weight: 600;
  margin: 0px 10px;
}
.sq_box span.wishlist i {
  color: #adb5bd;
  font-size: 20px;
}
.sq_box h4 {
  font-size: 18px;
  text-align: center;
  font-weight: 500;
  color: #343a40;
  margin-top: 10px;
  margin-bottom: 10px !important;
}
.sq_box .price-box {
  margin-bottom: 15px !important;
}
.sq_box .btn {
  border-radius: 50px;
  padding: 5px 13px;
  font-size: 15px;
  color: #fff;
  background-color: #fd7f34;
  font-weight: 600;
}
.sq_box .price-box span.price {
  text-decoration: line-through;
  color: #6c757d;
}
.sq_box span {
  font-size: 14px;
  font-weight: 600;
  margin: 0px 10px;
}
.sq_box .price-box span.offer-price {
  color: #28a745;
}
.sq_box img {
  object-fit: cover;
  height: 150px !important;
  margin-top: 20px;
}
.sq_box span.wishlist i:hover {
  color: #fd7f34;
}
</style>