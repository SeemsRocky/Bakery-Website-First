<html>
<head>
	<title>Customer Details</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

</head>
<body>

    <?php 

    if(isset($_POST['submit'])) 
        {
          include "DBconnection.php";

        	$email = $_POST['email'];
          $password = $_POST['password'];
        	
          $findPassword = $conn->prepare("SELECT Password FROM Customers WHERE Email = :email");
        	$findPassword->bindParam(':email',$email);
          $customerPassword = $findPassword->execute();
        	if($customerPassword == $password)
        	{
            
        		echo "Login successful!";
        	}
        	else
        	{
            echo "selected is " .$customerPassword . " and inputted is " . $password;
        		echo "Wrong password or email";
        	}
          
        	$conn = null; 
        }
        ?>

</body> 
</html>