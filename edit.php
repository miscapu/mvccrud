<?php

// call autoload
require __DIR__."/vendor/autoload.php";

define( 'title', 'Edit Product' );

use App\Controllers\ProductController;

// ID validation
if ( ! isset( $_GET[ 'id' ] ) or ! is_numeric( $_GET[ 'id' ] ) ):
    header( "Location:index.php?status=error" );
    exit();
endif;

// Consult
$product    =   ProductController::showProduct( $_GET[ 'id' ] );

// product validation
if ( !$product instanceof ProductController):
    header( "Location:index.php?status=error" );
    exit();
endif;

// Post Validation
if ( isset( $_POST[ 'name-frm' ], $_POST[ 'price-frm' ], $_POST[ 'description-frm' ]  ) ):
    $product->name          =   $_POST[ 'name-frm' ];
    $product->price         =   $_POST[ 'price-frm' ];
    $product->description   =   $_POST[ 'description-frm' ];
    $product->update();

    header( "Location:index.php" );
    exit();
    endif;

include __DIR__."/app/Views/Pages/form.php";