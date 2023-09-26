<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h2>Product Form</h2>
            <form action="">
                <div class="form-group">
                    <label for="name">name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                </div>
                <div class="form-group">
                    <label for="description">description:</label>
                    <textarea name="description" placeholder="Enter description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" id="price" placeholder="Enter price" name="price">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>

</div>

</body>
</html>
<?php /**PATH /home/hareesh/Projects/LaravelProjects/e_commerce/resources/views/products/create.blade.php ENDPATH**/ ?>