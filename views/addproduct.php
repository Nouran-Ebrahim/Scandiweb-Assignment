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
        <a class="navbar-brand mx-4" href='<?php echo Url::path("/add-product") ?>'>Product Add</a>
        <ul class="actions justify-content-end my-0 mx-4">
            <button form="my-form" type="submit" class="btn btn-success">save</button>
            <a href="<?php echo Url::path("/product-list") ?>" class="btn btn-danger">Cancel</a>
        </ul>
    </nav>
    <form id="my-form" class="w-50 mx-auto" method="post" action="<?php echo Url::path("/store-product") ?>">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">sku</label>
            <input type="text" name="sku" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">name</label>
            <input type="text" name="name" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputnum1" class="form-label">price ($)</label>
            <input type="number" name="price" class="form-control" id="exampleInputnum1">
        </div>

        <div class="mb-3">
            <select class="form-select m-0 mt-3" id="productType">
                <option value="Type Switcher" selected>Type Switcher</option>
                <option value="DVD" id="DVD">DVD-disc</option>
                <option value="Book" id="Book">Book</option>
                <option value="Furniture" id="Furniture">Furniture</option>
            </select>
        </div>
        <div class="mb-3">
            <div class="dvd d-none">
                <label for="size" class="form-label">Size (MB)</label>
                <input class="form-control" type="number" id="size" name="size">
                <small class="my-2 text-secondary">
                    Please, provide disc space in MB.
                </small>
            </div>
        </div>
        <div class="mb-3">
            <div class="book d-none">
                <label for="weight" class="form-label">Wight (KG)</label>
                <input class="form-control" type="number" id="weight" name="weight">
                <small class="my-2 text-secondary">
                    Please, provide book weight in KG.
                </small>
            </div>
        </div>
        <div class="mb-3">
            <div class="furniture d-none " >
            <label for="height " class="form-label">Height (CM)</label>
                <input class="form-control mt-1" type="number" id="height" name="height">
                <label for="width" class="form-label">Width (CM)</label>
                <input class="form-control mt-1" type="number" id="width" name="width">
                <label for="length" class="form-label">Length (CM)</label>
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