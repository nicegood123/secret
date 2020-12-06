<?php include('session.php'); ?>
<?php

//Get product Info
if (isset($_GET['product_id'])) {
  $product_id = $_GET['product_id'];
  $query = mysqli_query($conn,"SELECT * FROM product WHERE productid='$product_id' LIMIT 1");
  $product = mysqli_fetch_array($query);
}

?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
	<?php include('cart_search_field.php'); ?>
  <div style="height: 80px;"></div>
    <div class="row">
      <div class="col-lg-4">
        <div>
          <img src="../<?php echo '' . $product['photo']; ?>" class="" width="300px" height="300px">
        </div>
      </div>
      <div class="col-lg-8">
        <form method="post">
          <h3><?php echo $product['product_name']; ?></h3>
          <h4><b>PHP <?php echo number_format($product['product_price'], 2); ?></b></h4>
          <p><?php echo $product['product_description']; ?></p>

          <input type="submit" name="add-to-cart" class="btn btn-primary py-3 px-5" value="Add to Cart">
        </form>
      </div>
    </div>
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<script src="custom.js"></script>
</body>
</html>
