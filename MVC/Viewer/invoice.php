<?php
// Include config file
error_reporting(0);
require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){


    // Validate Name
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";     
    }
    else{
        $email = trim($_POST["email"]);
    }
}
$records1 = mysqli_query($mysqli,"select * from users"); // fetch data from database
$records2 = mysqli_query($mysqli,"select * from persondemand"); // fetch data from database
$records3 = mysqli_query($mysqli,"select * from persondetails"); // fetch data from database

?>
<html>
	<head>
		 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		 <title>Success</title>
	</head>
	<body class="container">
<h3 style="font-family: tahoma; text-align: center; font-size: 23px; margin-top: 50px;">Your Application has Submitted Succesfully</h3>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Enter your mail to see invoice:</label>
                <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div> 
</form>

<table class="table container">
  <thead>
    <tr>
      <th scope="col">Index</th>
      <th scope="col">Data</th>
    </tr>
  </thead>
  <tbody>
<?php  
$records = mysqli_query($mysqli,"select * from persondemand where email='$email'");
$records1 = mysqli_query($mysqli,"select * from persondetails where email='$email'");

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo "You Asked For" ?></td>
    <td><?php echo $data['amount']; ?></td>
  </tr>
  <tr>
    <td><?php echo "You Asking Duration" ?></td>
    <td><?php echo $data['duration']; ?></td>
  </tr>
<?php
}
while($data = mysqli_fetch_array($records1)){
?>
  <tr>
    <td><?php echo "You are Eligible for 90% of your Credit Card Limit." ?></td>
    <?php $eligible = $data['limitt']*0.9; ?>
    <td><?php echo $eligible; ?></td>
  </tr>
  <tr>
  	<td>You have to return</td>
  	<td><?php echo $eligible*1.15;  ?></td>
  </tr> 
 
 
<?php
}
?>
  </tbody>
</table>
</body>
</html>