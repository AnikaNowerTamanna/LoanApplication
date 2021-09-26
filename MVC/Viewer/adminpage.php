<html>
  <head>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <title>Success</title>
  </head>
  <body>

<div class="container" id="head">


<h1 style="text-align: center; font-family: tahoma;">Admin Panel:</h1>
<h2 style="text-align: center; font-family: tahoma;">Loan Requests:</h2>

<table border="2" class="table">

<?php
error_reporting(0);
include "config.php"; // Using database connection file here

$records = mysqli_query($mysqli,"select
 * from users");
?>
    <tr>
      <td>Emails:</td>
      <td>Name:</td>
    </tr>
    <tr>
<?php
while($data = mysqli_fetch_array($records)){
?>
      <td><?php echo $data['email']; ?></td>
      <td><?php echo $data['name']; ?></td>
    </tr>
<?php
}
?>
</table>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){


    // Validate Email
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

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Enter a mail to see Details:</label>
                <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div> 
</form>
</div>
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
    <td><?php echo "He/She Asked For" ?></td>
    <td><?php echo $data['amount']; ?></td>
  </tr>
  <tr>
    <td><?php echo "His/Her Duration" ?></td>
    <td><?php echo $data['duration']; ?></td>
  </tr>
  <tr>
    <td><?php echo "His/Her Platform" ?></td>
    <td><?php echo $data['platform']; ?></td>
  </tr>
  <tr>
    <td><?php echo "His/Her Transaction ID" ?></td>
    <td><?php echo $data['trxid']; ?></td>
  </tr>
<?php
}
while($data = mysqli_fetch_array($records1)){
?>
  <tr>
    <td><?php echo "His/Her Address" ?></td>
    <td><?php echo $data['address']; ?></td>
  </tr>
  <tr>
    <td><?php echo "He or She Staying here for" ?></td>
    <td><?php echo $data['duration']; ?></td>
  </tr>
  <tr>
    <td><?php echo "His/Her Employer Identity:" ?></td>
    <td><?php echo $data['employer']; ?></td>
  </tr>
  <tr>
    <td><?php echo "His/Her Occupation Identity:" ?></td>
    <td><?php echo $data['occupation']; ?></td>
  </tr>
    <tr>
    <td><?php echo "His/Her Occupation Experience:" ?></td>
    <td><?php echo $data['experience']; ?></td>
  </tr>
    <tr>
    <td><?php echo "His/Her Rent Identity:" ?></td>
    <td><?php echo $data['rent']; ?></td>
  </tr>
  <tr>
    <td><?php echo "His/Her Card No:" ?></td>
    <td><?php echo $data['ccn']; ?></td>
  </tr>
  <tr>
    <td><?php echo "His/Her Card Expiry Date:" ?></td>
    <td><?php echo $data['card_expiry']; ?></td>
  </tr>
  <tr>
    <td><?php echo "His/Her CVV:" ?></td>
    <td><?php echo $data['cvv']; ?></td>
  </tr>
  <tr>
    <td><?php echo "He/She is Eligible for 90% of his/her Credit Card Limit." ?></td>
    <?php $eligible = $data['limitt']*0.9; ?>
    <td><?php echo $eligible; ?></td>
  </tr>
  <tr>
    <td>You have to return</td>
    <td><?php echo $eligible*1.15;  ?></td>
  </tr>
  <tr>
    <form action="">
    <td>Approve | Decline</td>
    <td><input type="submit" name="approve" class="btn-primary" value="Approve">  <input type="submit" name="decline" class="btn-primary" value="Decline"></td>
    </form>
  </tr> 
 
 
<?php
}
?>
  </tbody>
</table>

<?php mysqli_close($mysqli); // Close connection ?>

</body>
</html>