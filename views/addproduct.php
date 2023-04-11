<?php
use phplite\Url\Url;
use phplite\Session\Session;

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
        <a class="navbar-brand mx-4" href='<?php echo Url::path("/add-product") ?>'>Product Add</a>
        <ul class="actions justify-content-end my-0 mx-4">
            <button form="product_form" type="submit" class="btn btn-success">save</button>
            <a href="<?php echo Url::path("/") ?>" class="btn btn-danger">Cancel</a>
        </ul>
    </nav>
    <form id="product_form" class="w-50 mx-auto mt-5" method="post" action="<?php echo Url::path("/store-product") ?>">
        <div class="mb-3 row">
            <?php
            if (Session::get('msg')) { ?>
                <div class="alert alert-danger">
                    <?php echo Session::flash('msg'); ?>
                </div>
                <?php
            }
            ?>
            <label for="sku" class="col-sm-2 col-form-label">SKU</label>
            <div class="col-sm-10">
                <input type="text" name="sku"  class="form-control" id="sku" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Price ($)</label>
            <div class="col-sm-10">
                <input type="number" name="price" class="form-control" id="price" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="productType" class="col-sm-2 col-form-label">Type Switcher</label>
            <div class="col-sm-10">
                <select class="form-select m-0" name="productType" id="productType" required>
                    <option value="">Type Switcher</option>
                    <option value="DVD" id="DVD">DVD-disc</option>
                    <option value="Book" id="Book">Book</option>
                    <option value="Furniture" id="Furniture">Furniture</option>
                </select>
            </div>
        </div>
        <div class="mb-3 dvd d-none row">
            <label for="size" class="col-sm-2 col-form-label">Size (MB)</label>
            <div class="col-sm-10">
                <input class="form-control" type="number" id="size" name="size" required>
                <small class="my-2 text-secondary">
                    Please, provide disc space in MB.
                </small>
            </div>
        </div>
        <div class="mb-3 book d-none row">
            <label for="weight" class="col-sm-2 col-form-label">Wight (KG)</label>
            <div class="col-sm-10">
                <input class="form-control" type="number" id="weight" name="weight">
                <small class="my-2 text-secondary">
                    Please, provide book weight in KG.
                </small>
            </div>
        </div>
        <div class="mb-3 furniture d-none row">

            <label for="height " class="col-sm-2 col-form-label">Height (CM)</label>
            <div class="col-sm-10">
                <input class="form-control mt-1" type="number" id="height" name="height">
            </div>
            <label for="width" class="col-sm-2 col-form-label">Width (CM)</label>
            <div class="col-sm-10">
                <input class="form-control mt-1" type="number" id="width" name="width">
            </div>
            <label for="length" class="col-sm-2 col-form-label">Length (CM)</label>
            <div class="col-sm-10">
                <input class="form-control mt-1" type="number" id="length" name="length">
                <small class="my-2 text-secondary">
                    Please, provide all dimensions in CM .
                </small>
            </div>
        </div>
    </form>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src='../assets/main.js'></script>
</body>

</html>