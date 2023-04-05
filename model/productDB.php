<?php 

function showProductInfo(){
    require "../model/connection.php";
    $sql = "SELECT productId,productName,price,pic,productDetails,productReview FROM product";
    $stmt = $conn -> prepare($sql);
    // $stmt->bind_param("s", $_SESSION['username']);
    if($stmt -> execute() > 0){
        $stmt->bind_result($productId,$productName, $price, $pic, $productDetails, $productReview);
        $rows = array();
        while ($stmt->fetch()) {

            $rows[] = array('productId' => $productId, 'productName' => $productName, 'price' => $price, 'pic' => $pic, 'productDetails' => $productDetails, 'productReview' => $productReview);
        }
        $_SESSION['productInfo'] = $rows;
        $stmt->close(); 
        return true;
    }else{
        return false;
    }
}

?>