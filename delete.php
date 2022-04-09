<!-- <?php
//  bazastan dakavshireba
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root' , '');
// exception srola tu error moxda da ver daukavshirda mysql bazas
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

// მონაცემთა ბაზასთან დაკავშირების შემდეგ ინფორმაციის წაკითხვა და გამოტანა

// washla monacemta bazidan

$id = $_POST['id'] ?? null;
if(!$id){
    header('Location: index.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM products WHERE id = :id');
$statement->bindValue(':id', $id);

// monishvnis shemdeg aucileblad unda gavuketot execute dabrunebul statements
$statement->execute();

header('Location: index.php')



?> -->

<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: index.php'); ?>