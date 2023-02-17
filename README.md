# Welcome to MiSCapu MVC Crud with PHP and PDO!


For the script to work, first, you must create a table in your database.

The next step is run the following command from your terminal:

    composer install

Next, you must alter your database access credentials in the **Product.php** file which is in the following path:

    app/Models/Product.php

Alter the following lines:

    /**  
     * Database data connection */
    const HOST = 'localhost';  
    const USER = 'root';  
    const PASS = 'root';  
    const DBNAME = 'miscapu';



