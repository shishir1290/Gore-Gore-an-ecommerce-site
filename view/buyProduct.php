<?php
session_start(); 
include 'header.php';
$customerId="";
$customerName = "";

if(isset($_SESSION['username'])){

echo "<h1 align='center'>Select Payment Method</h1>";

require "../model/productDB.php";

// Get the product ID from the URL parameter
if (isset($_POST['BuyNow'])) {
    $product_id = $_POST['product_id'];
    echo $product_id;
} else {
    die("Product ID not specified.");
}

    $sql = "SELECT * FROM product WHERE productId = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $product_id );
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        $details = $product['productDetails'];
        $price = $product['price'];
        $productName = $product['productName'];
        $product_pic = $product['pic'];
    }

echo "<div class='product'>
        <h1>".$productName."</h1>
        <p><b>Price: ".$price." TK</b></p>
        <img src='../". $product_pic."' alt='". $productName."' height='150' width='150'>
      </div>";

?>
<!DOCTYPE html>
<html>
<head>
  <title>Select Payment Method</title>
    <link rel="stylesheet" type="text/css" href="buyProduct.css">
</head>
<body>
  <?php if (isset($error)): ?>
<p style="color: red;"><?php echo $error; ?></p>
  <?php endif; ?>
  <form method="POST" action="../controller/buyProductAction.php" novalidate>
    <p>
      <label>
        <input type="radio" name="payment_method" value="Cash on delivery"> 
        <?php echo ($_SESSION['payment_method'] ?? '') === 'cash_on_delivery' ? 'checked' : ''; ?>
        Cash on delivery
      </label>
    </p>
    <p>
      <label>
        <input type="radio" name="payment_method" value="bkash">
        <?php echo ($_SESSION['payment_method'] ?? '') === 'bkash' ? 'checked' : ''; ?>
        bKash
        </label>
        </p>
        <p>
        <label>
        <input type="radio" name="payment_method" value="rocket"> 
        <?php echo ($_SESSION['payment_method'] ?? '') === 'rocket' ? 'checked' : ''; ?>
        Rocket
        </label>
        </p>
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
        <button type="submit" name="PlaceOrde">Place Order</button>

  </form>
</body>
</html>
<?php 
}else{
  header("Location: login.php");
}
include('footer.php');
?>



