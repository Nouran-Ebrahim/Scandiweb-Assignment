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
            <button form="my-form2" type="submit" class="btn btn-danger">Mass Delete</button>
        </ul>
    </nav>


    <div class="container">
        <form id="my-form2" method="post" class="container py-4" id="products_form"
            action="<?php echo Url::path("/delete-product") ?>">
            <div class="row">
                <?php foreach ($products as $product): ?>
                    <div class="card mb-4 mx-4" style="width: 15rem;">
                        <div class="form-check">
                            <input name="deleted" class="form-check-input delete-checkbox" type="checkbox"
                                value="<?php echo $product->id; ?>" id="flexCheckDefault">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title ">
                                <?php echo $product->sku; ?>
                            </h5>
                            <h6 class="card-subtitle mb-2">
                                <?php echo $product->name; ?>
                            </h6>
                            <h6 class="card-subtitle mb-2">
                                <?php echo $product->price; ?> $
                            </h6>
                            <h6 class="type">
                                <?php echo $product->size ? "Size: " . $product->size . " MB" : null ?>
                                <?php echo $product->weight ? "Weight: " . $product->weight . " KG" : null ?>
                                <?php echo $product->size == null && $product->weight == null ? "Dimensions: " . $product->height . "x" . $product->width . "x" . $product->length : null ?>
                            </h6>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </form>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src='../assets/main.js'></script>
</body>

</html>