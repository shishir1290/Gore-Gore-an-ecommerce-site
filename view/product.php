<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Products</title>
	<link rel="stylesheet" type="text/css" href="product.css">
</head>
<body>
	<section class="featured-products">
		<div class="container">
			<?php

				require "../model/productDB.php";

				$flag = showProductInfo();
				if($flag === true){
				    // shob gula review array theke niye dekhabo 
				    $productInfo = $_SESSION['productInfo'];
				    // Loop through the array and display the data
				    $count = 0;
				    echo '<div class="row">';
				    foreach ($productInfo as $rowAgain) {
				        if($count % 3 == 0 && $count > 0) {
				            echo '</div><div class="row">';
				        }
				        $count++;
				        $productId = $rowAgain['productId'];
				        $productName = $rowAgain['productName'];
				        $price = $rowAgain['price'];
				        $pic = $rowAgain['pic'];
				        $productDetails = $rowAgain['productDetails'];
				        $productReview = $rowAgain['productReview'];
				        // HTML code to display the product using CSS
				        ?>
				        <div class="product">
				            <img src="../<?php echo $pic; ?>">
				            <h3><?php echo $productName; ?></h3>
				            <p>Price: <?php echo $price; ?></p>
				            <form action="../controlar/addToCart.php" method="POST" class="cta1">
				                <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
				                <input type="hidden" name="product_name" value="<?php echo $productName; ?>">
				                <input type="hidden" name="product_price" value="<?php echo $price; ?>">
				                <input type="submit" value="Add to cart" name="add_to_cart">
				            </form>
				        </div>
				        <?php
				    }
				    echo '</div>';
				}

			?>
		</div>
	</section>
</body>
</html>
