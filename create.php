<?php

//  bazastan dakavshireba
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root' , '');
// exception srola tu error moxda da ver daukavshirda mysql bazas
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


// // super global romelic associative massiveshi inaxavs chvens dasabmitebul formis datas
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";


//  echo "<pre>";
//  var_dump($_SERVER['REQUEST_METHOD']);
//  echo "</pre>";


// postidan informaciis amogeba


$price = '';
$title = '';
$description = '';





$price =$_POST['price'] ?? null;
$title =$_POST['title'] ?? null;
$description =$_POST['description'] ?? null;



// validacia

$errors = [];

// Price tu ar arsebobs da is aris an undefined an null mashin errors arrayshi davamatot price is required
if(!$price) {
    $errors[] = 'Price is required';
}

if(!$title) {
    $errors[] = 'Title is required';
}




// rodesac erorrebis maosivi iqneba carieli shesruldeba bazashi gagzavnis kodi
// empty funqcia amowmebs carielia tu ara masivi , tu carielia abrunebs true , tu rame aris shignit false




if(empty($errors)) {


// bazashi informaciis shenaxva kerdzod produqtebis cxrilshi informaciis shenaxva

$statement = $pdo->prepare("INSERT INTO products (title,img,price,description,create_date)
VALUES (:title, :img, :price, :description, :date)");

// chven values gaadavecit named parametrebit romlebsac axla unda gavuwerot realuri mnishvnelobebi
$statement->bindValue(':title', $title);
$statement->bindValue(':img', '');
$statement->bindValue(':price', $price);
$statement->bindValue(':description', $description);
$statement->bindValue(':date', date('Y-m-d H:i:s'));


// amis shemdeg unda gamovidzaxot execute romelic am yvelafers gadaitans bazashi
$statement->execute();

// dadasturebis mere gadaiyvans mtavar gverdze
header("Location: index.php");

}

//   echo "<pre>";
//   var_dump($errors);
//   echo "</pre>";



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
    <h1>Create new product</h1>

    <!-- Validacaia -->
    <?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $key => $error) : ?>
        <div> <?php echo $error; ?> </div>
        <?php endforeach; ?>
    </div>


    <?php endif;  ?>



    <form method="post">
        <div class="mb-3">
            <label class="form-label">Product Image</label>
            <input type="file" name='image' class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Product Title</label>
            <input type="text" name='title' class="form-control" value=<?php echo $title ?>>
        </div>
        <div class="mb-3">
            <label class="form-label">Product Description</label>
            <textarea class="form-control" name='description' placeholder="Leave a comment here"
                value=<?php echo $description ?>></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Product Price</label>
            <input type="number" name='price' class="form-control" value=<?php echo $price ?>>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>






    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>