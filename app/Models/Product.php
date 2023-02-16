<?php
/**
 * Model Product: Create interaction with Database
 * @author MiSCapu
 * Author URI: https://miscapu.com
 */
namespace App\Models;
use \PDO;
use \PDOException;
use \PDOStatement;

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

    /**
     * Method for connection to Database
     */
    private function setConnection(){
        try {
            $this->connection   =   new PDO( 'mysql:host='.self::HOST.';dbname='.self::DBNAME, self::USER, self::PASS);
            $this->connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

        }catch( PDOException $exception ){
            die( "Error".$exception->getMessage() );
        }
    }

    /**
     * @param $query
     * @param array $params
     * @return false|PDOStatement
     */
    public function executeQuery( $query, $params = [] ){
        try {
            // store prepare query into $statement variable
            $statement  =   $this->connection->prepare( $query );
            // execute query
            $statement->execute( $params );
            return $statement;
        }catch( PDOException $exception ){
            die( "Error in execution query: ".$exception->getMessage() );
        }
    }






}

// debug
//$productModel   =   new Product( 'products' );
//echo "<pre>";
//print_r( $productModel ); //OK
//echo "</pre>";