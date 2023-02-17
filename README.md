# Welcome to MiSCapu MVC Crud with PHP and PDO!


For the script to work, first, you must create a table in your database.

1. First, run the following command from your terminal:

    composer install

2. Next, you must Import the file **products.sql** into your database.

3. Finally, you must alter your database access credentials in the **Product.php** file which is in the following path:

    app/Models/Product.php

Alter the following lines:

    /**  
     * Database data connection */
    const HOST = 'localhost';  
    const USER = 'root';  
    const PASS = 'root';  
    const DBNAME = 'miscapuCrud';



