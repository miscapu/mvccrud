<?php
require __DIR__.'/vendor/autoload.php';
// create title variable
$title  =   "Insert Product";

use \App\Controllers\ProductController;
$product    =   new ProductController();

// debug
//echo $_POST['name-frm'];
//exit();

// Post Validation
if ( isset( $_POST[ 'name-frm' ], $_POST[ 'price-frm' ], $_POST[ 'description-frm' ] ) ):
    $product->name          =   $_POST[ 'name-frm' ];
    $product->price         =   $_POST[ 'price-frm' ];
    $product->description   =   $_POST[ 'description-frm' ];

    $product->createProduct();

    header( "Location: index.php?status=success" );
    exit();
    endif;


include __DIR__.'/app/Views/Pages/insert.php';