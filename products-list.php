<?php
require('app/Customer.php');
require('app/Product.php');
require('app/FileUtility.php');

$products_data = FileUtility::openCSV('products.csv');

$products = Product::convertArrayToProducts($products_data);

$customer = new Customer('John Doe', 'john@mail.com');
?>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>My Cart</title>
</head>
<body>

<h1>Welcome <?php echo $customer->getName() ?>!</h1>
<h2>Products</h2>
<h4>
    <a href="shopping-cart.php">Shopping Cart</a>
</h4>

<?php foreach ($products as $product): ?>

<form action="add-to-cart.php" method="POST">
    <input type="hidden" name="product_id" value="<?php echo $product->getId(); ?>" />
    <h3><?php echo $product->getName(); ?></h3>
    <img src="<?php echo $product->getImage(); ?>" height="100px" />
    <p>
        <?php echo $product->getDescription(); ?><br/>
        <span style="color: blue">PHP <?php echo $product->getPrice(); ?></span>
        Qty <input type="number" name="quantity" class="quantity" value="0" />
        <button type="submit">
            ADD TO CART
        </button>
    </p>
</form>

<?php endforeach; ?>

</body>
</html>