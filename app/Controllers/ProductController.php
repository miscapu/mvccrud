<?php
/**
 * Controller ProductController: Interaction between Database and data
 * @author MiSCapu
 * Author URI: https://miscapu.com
 */
namespace App\Controllers;

use App\Models\Product;
use PDO;

class ProductController{

    /**
     * @param null $where
     * @param null $order
     * @param null $limit
     * @param null $fields
     * @return array
     */
    public static function showProducts( $where = null, $order = null, $limit = null, $fields = null ): array
    {
        return ( new Product( 'products' ))->selectProducts( $where,$order,$limit,$fields )
                               ->fetchAll( PDO::FETCH_CLASS, self::class );
    }
}