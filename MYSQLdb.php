<?php
include "DBconnection.php";
 
	//$conn = new PDO("mysql:host=$servername;dbname=bakeryOrdersDB", $username, $password);
    // set the PDO error mode to exception
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    $exists = $conn->query(
    "SELECT count(*)
	FROM information_schema.TABLES
	WHERE TABLE_SCHEMA = 'bakeryOrdersDB'");
	$result = $exists->fetch();
    if($result[0] >= 5)
    {
    	echo "All tables have already been created";
    }
    else
    {
    	$CustomerTable = "CREATE TABLE IF NOT EXISTS Customers
    	(CustomerID int NOT NULL AUTO_INCREMENT,
        Username varchar(255) NOT NULL UNIQUE,
        Password varchar(255) NOT NULL,
     	FirstName varchar(255) NOT NULL,
    	LastName varchar(255) NOT NULL,
 		Address varchar(255) NOT NULL,
    	PhoneNumber varchar(10) NOT NULL,
    	Email varchar(255) UNIQUE,
    	PRIMARY KEY(CustomerID))";

    	$OrdersTable = "CREATE TABLE IF NOT EXISTS Orders
    	(OrderID int NOT NULL AUTO_INCREMENT,
    	Total double, 
        orderDate Date,
    	PRIMARY KEY(OrderID))";
    	
    	$ItemsTable = "CREATE TABLE IF NOT EXISTS Items
    	(ItemID int NOT NULL AUTO_INCREMENT,
    	name varchar(255),
    	price double,
        PRIMARY KEY(ItemID))";

    	$OrderItemsTable = "CREATE TABLE IF NOT EXISTS OrderItem
    	(OrderID_FK int NOT NULL REFERENCES Orders(OrderID),
		ItemID_FK int NOT NULL REFERENCES Items(ItemID),
		Quantity int NOT NULL,
		PRIMARY KEY (OrderID_FK, ItemID_FK))";

		$CustomerOrderTable = "CREATE TABLE IF NOT EXISTS CustomerOrder 
		(CustomerID_FK int NOT NULL REFERENCES Customers(CustomerID),
		OrderID_FK int NOT NULL REFERENCES Orders(OrderID),
		PRIMARY KEY (CustomerID_FK,OrderID_FK))";
		

        $conn->exec($CustomerTable);
        echo "We have successfully created Customers Table\r\n";
        $conn->exec($OrdersTable);
        echo "We have successfully created Orders Table\r\n";
        $conn->exec($ItemsTable);
        echo "We have successfully created Items Table\r\n";
        $conn->exec($CustomerOrderTable);
        echo "We have successfully created CustomerOrders Table\r\n";
        $conn->exec($OrderItemsTable);
        echo "We have successfully created OrderItems Table\r\n";
        
    }

?>