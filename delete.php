<?php

// call autoload
require __DIR__."/vendor/autoload.php";

// call controller Product
use App\Controllers\ProductController;

// ID validation
if ( !isset( $_GET[ 'id' ] ) or !is_numeric( $_GET[ 'id' ] )):
    header( "Location:index.php?status=error" );
    exit();
endif;

// consult product
$product    =   ProductController::showProduct( $_GET[ 'id' ] );

// product validation
if ( ! $product instanceof ProductController):
    header( "Location:index.php?status=error" );
    exit();
endif;

// Post validation
if ( isset( $_POST[ 'delete' ] ) ):
    $product->delete();
    header( "Location:index.php?status=success" );
    exit();
endif;

include __DIR__."/app/Views/Pages/confirmDelete.php";