<?php

//  bazastan dakavshireba
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root' , '');
// exception srola tu error moxda da ver daukavshirda mysql bazas
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


echo "<pre>";
// super global romelic associative massiveshi inaxavs chvens dasabmitebul formis datas
var_dump($_POST);
echo "</pre>";

// postidan informaciis amogeba

$price =$_POST['price'];
$title =$_POST['title'];
$description =$_POST['description'];

// bazashi informaciis shenaxva kerdzod produqtebis cxrilshi informaciis shenaxva

$pdo->prepare("INSERT INTO products (title,image,price,description,create_date)
VALUES ($title,'',$price,$description,)
")

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="app.css" rel="stylesheet" />

    <title>Products CRUD!</title>
</head>

<body>

    <h1>Products CRUD!</h1>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Product Image</label>
            <input type="file" name='image' class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Product Title</label>
            <input type="text" name='title' class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Product Description</label>
            <textarea class="form-control" name='description' placeholder="Leave a comment here"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Product Price</label>
            <input type="number" name='price' class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>