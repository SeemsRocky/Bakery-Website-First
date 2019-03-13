<html>
<head>
	<title>Customer Details</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

</head>
<body>

    <?php if (isset($_POST['submit'])): 

        include "DBconnection.php";

      	$firstname = $_POST['firstname'];
      	$lastname = $_POST['lastname'];
        $address = $_POST['address'];
      	$phonenumber = $_POST['phonenumber'];
      	$email = $_POST['email'];
        $password = $_POST['password'];

        $isEmailDuplicatePrep = $conn->prepare("SELECT COUNT(Email) FROM Customers WHERE Email=:email");
        $isEmailDuplicatePrep->bindParam(":email",$email);
        $isEmailDuplicatePrep->execute();
        $isEmailDuplicate = $isEmailDuplicatePrep->fetch();
        
        if($isEmailDuplicate[0] == 0)
        {
            $customerInsert = $conn->prepare ("INSERT INTO Customers(FirstName,LastName,Address, PhoneNumber,Password,Email)VALUES(:firstname,:lastname,:address,:phonenumber,:password,:email)");

            $customerInsert->bindParam(':firstname',$firstname);
            $customerInsert->bindParam(':lastname',$lastname);
            $customerInsert->bindParam(':address',$address);
            $customerInsert->bindParam(':phonenumber',$phonenumber);
            $customerInsert->bindParam(':email',$email);
            $customerInsert->bindParam(':password',$password);
            
            if($customerInsert->execute())
            { ?>
              <h2>Thank You <?php echo $_POST['firstname']; ?> </h2>

              <p>You have been registered as
                  <?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?>
              </p>

              <p>Go <a href="/home.html">back</a> to the form</p>
            <?php 
            }
            else
            {
              echo "unable to create";
            }
          }
          else
          {
              echo "Duplicate email find a way to do this. add like red text or something";
          }
        endif;
      	$conn = null; 
        ?>

         
</body> 
</html>