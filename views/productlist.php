<?php
use phplite\Url\Url;

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='../assets/main.css'>

</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand mx-4" href='<?php echo Url::path("/product-list") ?>'>Product List</a>
        <ul class="actions justify-content-end my-0 mx-4">
            <a href='<?php echo Url::path("/add-product") ?>' class="btn btn-success">Add Product</a>
            <a href="/mass-delete" class="btn btn-danger">Mass Delete</a>
        </ul>
    </nav>

    <?php 
   foreach ($products as $product) {
    echo $product["name"];
  }
// print_r($products);
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src='../assets/main.js'></script>
</body>

</html>