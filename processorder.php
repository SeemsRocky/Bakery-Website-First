<html>
	<head>
		<title> Receipt </title>
		<style>
		p{
			display:inline-block;
		}
		</style>
	</head>
	<body>
		<?php
		function convertTo2DecimalPoints(number)
		{
		    return number_format((float)$number, 2, '.', '');
		}

			include "DBconnection.php";

			$inputs = $_POST['foodid'];
			$UID = 1;
			$total = 0.0;
			$foodArray = array();

			foreach($inputs as $quantity)
			{
				if ($quantity > 0)
				{
					$getNamePriceQuery = $conn->prepare("SELECT name,price FROM items WHERE ItemID = :itemid");
					$getNamePriceQuery->bindParam(":itemid",$UID);
					$getNamePriceQuery->execute();

					$namePriceArr = $getNamePriceQuery->fetchall();
					$name = isset($namePriceArr[0]) ? $namePriceArr[0] : null;

					$itemTotal = $name[1] * $quantity;
					$total += $itemTotal;
					$itemTotal = convertTo2DecimalPoints($itemTotal);
					$foodArray += array($name[0] => $itemTotal);
					
				}
				++$UID;
			}
			
		?>
		<h1> Receipt </h1>
		
		<?php 
			foreach($foodArray as $name=>$price) {?>
			<div>
				<p id="name"> <?php print $name; ?> </p> <p id="price"> <?php print $price; ?> </p>
			</div>
		<?php }?>
		
		<h2 id="total"> Total $<?php echo convertTo2DecimalPoints($total); ?> </h2>
	</body>
</html>

