<!-- <?php 
	session_start();
	require "../model/connection.php";
	$customerName = $_SESSION['username'];
	

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	    if (isset($_POST['payment_method'])) {
	        $payment_method = $_POST['payment_method'];
	        $_SESSION['payment_method'] = $_POST['payment_method'];
	        $stmt = mysqli_prepare($conn, "INSERT INTO orderinfo (customerId, customerName, productId, productPrice, payment_method) VALUES (?, ?, ?, ?, ?)");
	        mysqli_stmt_bind_param($stmt, "issds", $customerId, $customerName, $product_id, $price, $payment_method);
	        if (mysqli_stmt_execute($stmt)) {
	            header("Location: checkout.php?payment_method=$payment_method&price=$productPrice");
	        } else {
	            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	        }
	        mysqli_stmt_close($stmt);
	    } else {
	        $error = 'Please select a payment method.';
	    }
	}
?> -->


<?php 
  session_start();
  require "../model/connection.php";
  
  $customerName = $_SESSION['username'];
  // $product_id = $_SESSION['product_id'];
  $productPrice = $_SESSION['product_price'];

  if (isset($_POST['PlaceOrde'])) {
    $productId = $_POST['product_id'];
    // echo $product_id;
  }

  require "../model/productDB.php";
    $flag = BuyProduct($productId);
    if($flag === true){
      // shob gula review array theke niye dekhabo 
      $BuyProduct = $_SESSION['BuyProduct'];
      // Loop through the array and display the data
      foreach ($BuyProduct as $product) {
        $details = $product['productDetails'];
        $price = $product['price'];
        $productName = $product['productName'];
        $product_pic = $product['pic'];
      }
    }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['payment_method'])) {
      $payment_method = $_POST['payment_method'];
      $_SESSION['payment_method'] = $_POST['payment_method'];
      
      $stmt = mysqli_prepare($conn, "INSERT INTO orderinfo (customerName, productId, productPrice, payment_method) VALUES (?, ?, ?, ?, ?)");
      mysqli_stmt_bind_param($stmt, "ssds", $customerName, $productId, $productPrice, $payment_method);
      
      if (mysqli_stmt_execute($stmt)) {
        $order_id = mysqli_insert_id($conn);
        $_SESSION['order_id'] = $order_id;
        
        if ($payment_method === 'Cash on delivery') {
          header("Location: orderConfirmation.php");
        } else {
          // Redirect to payment gateway
          header("Location: paymentGateway.php");
        }
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      
      mysqli_stmt_close($stmt);
    } else {
      $error = 'Please select a payment method.';
    }
  }
?>
