<?php
session_start();
include 'header.php';

if(isset($_COOKIE['cart'])) {
    $cart_items = $_COOKIE['cart'];
    
    require "../model/connection.php";
    
    $stmt = mysqli_prepare($conn, "SELECT * FROM product WHERE productId = ?");
    
    foreach($cart_items as $product_id => $product) {
        mysqli_stmt_bind_param($stmt, "i", $product_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        echo '
        <td><img src="'.$row['pic'].'" height="200" width="200"></td>
        <td>'.$row['productName'].'('.$row['price'].') </td>
        <td> </td>';
        echo '<td><button><a href="productInfo.php?productId='.$product_id.'" style="text-decoration:none;">Buy Now</a></button></td>';
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo "Your cart is empty.";
}

include 'footer.php';
?>
