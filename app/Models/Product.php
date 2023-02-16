<?php
/**
 * Model Product: Create interaction with Database
 * @author MiSCapu
 * Author URI: https://miscapu.com
 */
namespace App\Models;
use \PDO;
use \PDOException;

class Product{

    /**
     * **********************
     * Database credentials
     * **********************
     */

    /**
     * HOST connection database
     * @var string
     */
    const HOST  =   "localhost";

    /**
     * User connection database
     * @var string
     */
    const USER  =   "root";

    /**
     * PASS: password connection database
     * @var string
     */
    const PASS  =   "root";

    /**
     * DBNAME: database name
     * @var string
     */
    const DBNAME  =   "miscapuCrud";


    /**
     * table: table name manipulate
     * @var string
     */
    private $table;

    /**
     * Instance DB PDO
     * @var PDO
     */
    private $connection;


    /**
     * Define table and coonnection instance
     * @param string $table
     */
    public function __construct( $table = null )
    {
        // Table property is equal to param
        $this->table    =   $table;
        // Start function setConnection for connect to database
        $this->setConnection();
    }

    private function setConnection(){
        try {
            $this->connection   =   new PDO( 'mysql:host='.self::HOST.';dbname='.self::DBNAME, self::USER, self::PASS);
            $this->connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

        }catch( PDOException $exception ){
            die( "Error".$exception->getMessage() );
        }
    }
}

// debug
$productModel   =   new Product( 'products' );
echo "<pre>";
print_r( $productModel );
echo "</pre>";