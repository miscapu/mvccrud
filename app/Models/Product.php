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
    private string $table;

    /**
     * Instance DB PDO
     * @var PDO
     */
    private PDO $connection;


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
     * @return PDOStatement
     */
    public function executeQuery( $query, $params = [] ):PDOStatement{
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

    /**
     * @param null $where
     * @param null $order
     * @param null $limit
     * @param array|null $fields
     * @return false|PDOStatement
     */
    public function selectProducts( $where = null, $order = null, $limit = null, array $fields = null  ){
        // Data of query
        $where  =   strlen( $where ) ? 'WHERE '.$where : "";
        $order  =   strlen( $order ) ? 'ORDER BY '.$order : "";
        $limit  =   strlen( $limit ) ? 'LIMIT '.$limit : "";
        $fields =   strlen( $fields ) ? $fields : "*";

        // Mount to query
        $query  =   "SELECT ".$fields." FROM ".$this->table." ".$where." ".$order." ".$limit."";
//        echo $query; #debug ok
        return $this->executeQuery( $query );
    }


    /**
     * @param $values
     * @return string
     */
    public function addProduct( array $values ):string{
        // query data
        $fields =   array_keys( $values ); #id,name,price,description
        $binds  =   array_pad( [], count( $fields ), '?'  );

        // Mount query
        $query  =   "INSERT INTO ".$this->table." ( ".implode( ',', $fields )." ) VALUES ( ".implode( ',', $binds )." ) ";
        //debug
//        echo $query;
//        exit();

        // execute query
        $this->executeQuery( $query, array_values( $values ) );

        // return last insert ID
        return $this->connection->lastInsertId();
    }






}

// debug
//$productModel   =   new Product( 'products' );
//echo "<pre>";
//print_r( $productModel->selectProducts() ); //OK
//echo "</pre>";
//
//// other debug
//$instanceProduct    =   new Product( "products" );
//$products  =   $instanceProduct->selectProducts()->fetchAll();
//
//foreach ( $products as $product ):
//    echo $product['name']; #ok
//    endforeach;


// debug addProduct method
//$addProduct     =   new Product( 'products' );
//$addProduct->addProduct( [ 'a', 'b' ] );
