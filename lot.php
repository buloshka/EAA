<?php
require_once('helpers.php');
require_once('core/init.php');

$is_auth = rand(0, 1);
/*print($_GET['id']);*/
/*array_keys(array_combine(array_keys($userdb), array_column($userdb, 'uid')),40489)    */
$category = query('SELECT * from categories')->fetchAll();
$product = query('SELECT * from lots WHERE id='.$_GET['id'])->fetchAll()[0];
$user_name = 'Павел';
require_once('helpers.php');
$page_name= $product['name'];
/*print($product['name']);*/
$indexContent = include_template("lot-template.php",[
    'category'=> $category,
    'product' => $product
]);
$page = include_template("layout.php",[
    "page_name" => $page_name,
    "is_auth" => $is_auth,
    'content'=> $indexContent,
    "category" => $category,
    'user_name'=> $user_name
]);
print($page);
?>
