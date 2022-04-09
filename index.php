<?php

//  bazastan dakavshireba
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root' , '');
// exception srola tu error moxda da ver daukavshirda mysql bazas
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

// მონაცემთა ბაზასთან დაკავშირების შემდეგ ინფორმაციის წაკითხვა და გამოტანა

// ყველაფრის მონიშვნა შესაბამის მონაცემთა ბაზაში

$statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC'); // order by created_date alagebs axal produktebs tavshi shegmnis drois mixedvit

// monishvnis shemdeg aucileblad unda gavuketot execute dabrunebul statements
$statement->execute();
// dabrunebuli statementida asociaciur masivshi unda davfetchtot monacemebi da shevinaxot variableshi
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

//  dabechvda dabrunebuli asociaciuri masivis
// echo "<pre>";
// var_dump($products);
// echo "</pre>";


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
    <p>
        <a href="create.php" type="button" class="btn btn-sm btn-success">Add Product</a>
    </p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
                <th scope="col">Create Date</th>
            </tr>
        </thead>
        <tbody>

            <!-- gvaqvs produktebis masivi romlidanac foreach meshveobit gamogvaqs titoeuli produktis key romelic sheesabameba titoeul produkts -->
            <!-- da tviton titoeuli produqtis masivi romelsac cxrilebshi gavuketebt informaciis gamotanas  -->
            <?php foreach ($products as $key => $product) {  ?>



            <tr>
                <th scope="row"><?php echo $product['id'] ?></th>

                <!-- tu productebshi arsebobs image mashin gaakete shuashi moqceuli kodi -->
                <td><?php if($product['img']): ?>

                    <img src="<?php echo $product['img']  ?>" alt="<?php echo $product['title'] ?>"
                        class='product-image' />

                    <?php endif; ?>


                </td>
                <td><?php echo $product['title'] ?></td>
                <td><?php echo $product['price'] ?></td>
                <td><?php echo 'actions' ?></td>
                <td><?php echo $product['create_date'] ?></td>
                <td>
                    <a href="update.php?id=<?php echo $product['id'] ?>" type="button"
                        class="btn btn-sm btn-outline-primary">Edit</a>
                    <form method="post" action="delete.php" style="display: inline-block">
                        <input type="hidden" name="id" value="<?php echo $product['id'] ?>" />
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>

            <?php } ?>

        </tbody>
    </table>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>