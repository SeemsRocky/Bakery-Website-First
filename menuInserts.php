<?php
	include "DBconnection.php";
	$menu = array("hot dog"=>".8", "pineapple"=>".8", "egg tart"=>".6","dry pork"=>".8","roast pork"=>".8","neopolitan"=>"1.50","vanilla sponge"=>".9","lemon sponge"=>"1.0","coffee"=>".8","milk tea"=>".8", "chocolate"=>".8","ovaltine"=>".8");
	
	foreach($menu as $x => $x_value) {
		$insertQuery = $conn->prepare("INSERT INTO items(Name,Price)VALUES(:name,:price)");
		$insertQuery->bindParam(":name",$x);
		$insertQuery->bindParam(":price",$x_value);
		$insertQuery->execute()
		
	}

?>