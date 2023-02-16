<?php
/**
 * @author MiSCapu
 * Author URI: https://miscapu.com
 */

// call autoload psr-4
require __DIR__.'/vendor/autoload.php';

// call ProductController (app/controllers)
use \App\Controllers\ProductController;

$products   =   ProductController::showProducts();
$title      =   "Product's List";


include __DIR__."/app/Views/Pages/Dashboard.php";