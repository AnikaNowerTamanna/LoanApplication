<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){


    // Validate Amount
    if(empty(trim($_POST["amount"]))){
        $amount_err = "Please enter a amount.";     
    }
    else{
        $amount = trim($_POST["amount"]);
    }

    //// Validate Email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a Email.";     
    }
    else{
        $email = trim($_POST["email"]);
    }

    //Validate duration
 
    if(empty(trim($_POST["duration"]))){
        $duration_err = "Please enter a duration.";     
    }
    else{
        $duration = trim($_POST["duration"]);
    }
 
     // Validate platform
    if(empty(trim($_POST["platform"]))){
        $platform_err = "Please enter a platform.";     
    }
    else{
        $platform = trim($_POST["platform"]);
    }

    //Validate Transaction ID

    if(empty(trim($_POST["trxid"]))){
        $trxid_err = "Please enter a transaction id.";     
    }
    else{
        $trxid = trim($_POST["trxid"]);
    }

    // Check input errors before inserting in database
    if(empty($limitt_err) && empty($ccn_err) && empty($platform_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO persondemand (email, amount, duration, platform, trxid) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssss", $param_email, $param_amount, $param_duration, $param_platform, $param_trxid);
            
            // Set parameters
            $param_email = $email;
            $param_amount = $amount;
            $param_duration = $duration;
            $param_platform = $platform;
            $param_trxid = $trxid;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: invoice.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $mysqli->close();
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application Form for Loan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px tahoma; }
        .wrapper{ width: 360px; padding: 20px; }
         h2,p {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Get a Loan Easily!</h2>
        <p>Please fill this form:</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>  
            <div class="form-group">
                <label>Amount which you want to recieve:</label>
                <input type="text" name="amount" class="form-control <?php echo (!empty($amount_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $amount_err; ?></span>
            </div>  
            <div class="form-group">
                <label>How many Days you want to use these money?</label>
                <input type="text" name="duration" class="form-control <?php echo (!empty($duration_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $duration_err; ?></span>
            </div>  
            <div class="form-group">
                <label>Your platform:</label>
                <input type="text" name="platform" class="form-control <?php echo (!empty($platform_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $platform_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Make Payment:</label>
                <a href="#" class="form-control btn-outline-primary">Go To Payment Method</a>
                <label style="margin-top: 15px;"> Provide the Transaction ID:</label>
                <input type="text" name="trxid" class="form-control <?php echo (!empty($trxid_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $trxid_err; ?></span>

            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>

        </form>
        <h4 style="text-align: center;">If you face any problem, call us on <a href="callTo:+880123456789">+880123456789</a></h3>
    </div>    
</body>
</html>