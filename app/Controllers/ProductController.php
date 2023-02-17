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
     * declare properties for Product Object
     */
    /**
     * @var string
     */
    public string $id;
    /**
     * @var string;
     */
    public string $name;
    /**
     * @var string;
     */
    public string $price;
    /**
     * @var string
     */
    public string $description;

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

    /**
     * @return bool
     */
    public function createProduct():bool {
        $product    =   new Product( 'products' );
        $this->id   =   $product->insertProduct( [
                                                'name'          =>  $this->name,
                                                'price'         =>  $this->price,
                                                'description'   =>  $this->description
                                                ] );
        return true;
    }


    /**
     * @param $id
     * @return object
     */
    public static function showProduct( $id ):object{
        return ( new Product( 'products' ) )->selectProducts( 'id = '.$id )
                                                 ->fetchObject( self::class );
    }

    public function update(){
        return ( new Product( 'products' ) )->updateProduct( 'id        = '.$this->id, [
                                                                        'name'     =>  $this->name,
                                                                        'price'     =>  $this->price,
                                                                        'description'     =>  $this->description,
        ]  );
    }
}