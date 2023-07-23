<?php
    include('../includes/header.php');
?>

<style>
    .search {
        width: 100%;
        position: relative;
        display: flex;
        justify-content: center;
    }

    .searchTerm {
        width: 30%;
        border: 3px solid #00B4CC;
        border-right: none;
        padding: 15.5px;
        height: 36px;
        border-radius: 5px 0 0 5px;
        outline: none;
        color: #9DBFAF;
    }

    .searchTerm:focus{
        color: #00B4CC;
    }

    .searchButton {
        width: 40px;
        height: 36px;
        border: 1px solid #00B4CC;
        background: #00B4CC;
        text-align: center;
        color: #fff;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
        font-size: 20px;
    }
</style>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">View Product</li>
</ol>
<h2 class="text-center mb-3">PRODUCT</h2>
<div class="wrap mb-3">
    <div class="search">
        <input type="text" class="searchTerm" id="Search" onkeyup="myFunction()" placeholder="What are you looking for?" title="Type a product">
        <button type="submit" class="searchButton">
            <i class="fa fa-search"></i>
        </button>
    </div>
</div>
<div class="row"> 
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card-group" id="productList">
            <?php
            $query = "SELECT
                *
                FROM
                product
                INNER JOIN
                product_category
                ON 
                product.product_category_id = product_category.product_category_id
                WHERE product_status = 1";
            $query_run = mysqli_query($con, $query);
            $product = mysqli_num_rows($query_run) > 0;
            if ($product) {
                while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
            <div class="col-12 col-md-6 col-lg-3 mb-4 target">
                <a href="product_view?id=<?=$row['product_id'];?>" style="text-decoration:none; color:black;">
                    <div class="card h-100">
                        <img class="img-fluid card-img-top" src="<?php echo base_url ?>assets/img/products/<?php echo $row['photo'];?>"  alt="user-avatar" style="height:250px; width: 100%; object-fit: cover;">
                        <div class="card-body">
                            <h3 class="card-title text-center" style="font-size: 22px;"><?php echo $row['product_name']; ?></h3>
                            <p class="card-text text-center"> <?php echo $row['product_quantity'];?> PCS REMAINING</p>
                            <p class="card-text text-center"> <?php echo $row['category_name'];?> </p>
                            <p class="card-text text-center">
                                <?php
                                    if ($row['exp_date'] < date) {
                                        echo "<span style='color:red'> (Expired)</span>"; 
                                    } else { }
                                ?>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <?php
                }
            } else {
                echo "Nothing to View";
            }
            ?>
        </div>
        <div class="col-12 text-center mt-5" id="noResults" style="display: none;">
            <h3>No results found</h3>
        </div>
    </div>
</div>

<?php include('../includes/footer.php');?>

<script>
    function myFunction() {
        var input = document.getElementById("Search");
        var filter = input.value.toLowerCase();
        var nodes = document.getElementsByClassName('target');
        var resultsFound = false;

        for (i = 0; i < nodes.length; i++) {
            var productName = nodes[i].querySelector('.card-title').innerText.toLowerCase();
            if (productName.includes(filter)) {
                nodes[i].style.display = "block";
                resultsFound = true;
            } else {
                nodes[i].style.display = "none";
            }
        }

        var noResultsMsg = document.getElementById("noResults");
        if (resultsFound) {
            noResultsMsg.style.display = "none";
        } else {
            noResultsMsg.style.display = "block";
        }
    }
</script>