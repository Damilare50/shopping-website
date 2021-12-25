<?php
session_start();

require_once('./php/CreateDb.php');
require_once('./php/component.php');

$database = new CreateDb("ProductDB", "ProductTB");

if (isset($_POST['add'])) {
    //print_r($_POST['product_id']);
    if (isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], "product_id");
        // print_r($item_array_id);
        
        if (in_array($_POST['product_id'], $item_array_id)) {
            echo "<script>alert('Product is already added in the cart..!')</script> ";
            echo "<script>window.location = 'index.php'</script> ";
        } else {
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }
    } else {
        $item_array = array(
            'product_id' => $_POST['product_id']
        );
        $_SESSION['cart'][0] = $item_array;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    
<?php require_once("./php/header.php") ?>
<div class="container">
    <div class="row text-center py-5">
        <?php 
        $result = $database->getData();
        while ($row = mysqli_fetch_assoc($result)) {
            products($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
        }
        ?>
    </div>
</div>
    
</body>
</html>