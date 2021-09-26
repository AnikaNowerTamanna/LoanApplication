<?php
// Include config file
require_once "config.php";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    //// Validate Email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a Email.";     
    }
    else{
        $email = trim($_POST["email"]);
    }
    // Validate Address
    if(empty(trim($_POST["address"]))){
        $address_err = "Please enter a address.";     
    }
    else{
        $address = trim($_POST["address"]);
    }

    //// Validate Duration
    if(empty(trim($_POST["duration"]))){
        $duration_err = "Please enter a duration.";     
    }
    else{
        $duration = trim($_POST["duration"]);
    }
 
     // Validate Employer
    if(empty(trim($_POST["employer"]))){
        $employer_err = "Please enter a employer.";     
    }
    else{
        $employer = trim($_POST["employer"]);
    }

    
    // Validate Occupation
    if(empty(trim($_POST["occupation"]))){
        $occupation_err = "Please enter a occupation.";     
    }
    else{
        $occupation = trim($_POST["occupation"]);
    }

    // Validate experience
    if(empty(trim($_POST["experience"]))){
        $experience_err = "Please enter a experience.";     
    }
    else{
        $experience = trim($_POST["experience"]);
    }

    // Validate mincome
    if(empty(trim($_POST["mincome"]))){
        $mincome_err = "Please enter a mincome.";     
    }
    else{
        $mincome = trim($_POST["mincome"]);
    }

    // Validate rent
    if(empty(trim($_POST["rent"]))){
        $rent_err = "Please enter a rent.";     
    }
    else{
        $rent = trim($_POST["rent"]);
    }

    // Validate dpayment
    if(empty(trim($_POST["dpayment"]))){
        $dpayment_err = "Please enter a payment.";     
    }
    else{
        $dpayment = trim($_POST["dpayment"]);
    }

    // Validate ccn
    if(empty(trim($_POST["ccn"]))){
        $ccn = "Please enter a Credit Card Number.";     
    }
    else{
        $ccn = trim($_POST["ccn"]);
    }

    // Validate card_expiry
    if(empty(trim($_POST["card_expiry"]))){
        $card_expiry_err = "Please enter a card expiry date.";     
    }
    else{
        $card_expiry = trim($_POST["card_expiry"]);
    }

    // Validate cvv
    if(empty(trim($_POST["cvv"]))){
        $cvv_err = "Please enter a cvv.";     
    }
    else{
        $cvv = trim($_POST["cvv"]);
    }

    // Validate Limitt
    if(empty(trim($_POST["limitt"]))){
        $limitt_err = "Please enter a limitt.";     
    }
    else{
        $limitt = trim($_POST["limitt"]);
    }
    
    // Check input errors before inserting in database
    if(empty($limitt_err) && empty($ccn_err) && empty($employer_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO persondetails (email, address, duration, employer, occupation, experience, mincome, rent, dpayment, ccn, card_expiry, cvv, limitt) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssssssssssss",$param_email, $param_address, $param_duration, $param_employer, $param_occupation, $param_experience, $param_mincome, $param_rent, $param_dpayment, $param_ccn, $param_card_expiry, $param_cvv, $param_limitt);
            
            // Set parameters
            $param_email = $email;
            $param_address = $address;
            $param_duration = $duration;
            $param_employer = $employer;
            $param_occupation = $occupation;
            $param_experience = $experience;
            $param_mincome = $mincome;
            $param_rent = $rent;
            $param_dpayment = $dpayment;
            $param_ccn = $ccn;
            $param_card_expiry = $card_expiry;
            $param_cvv = $cvv;
            $param_limitt = $limitt;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: loanDemand.php");
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
    <div class="container-sm shadow p-3 mb-5 bg-white rounded">
        <h2>Get a Loan Easily!</h2>
        <p>Please fill this form:</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>  
            <div class="form-group">
                <label>Present Address:</label>
                <input type="text" name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $address_err; ?></span>
            </div>  
            <div class="form-group">
                <label>How long have you lived in your given address?</label>
                <input type="text" name="duration" class="form-control <?php echo (!empty($duration_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $duration_err; ?></span>
            </div>  
            <div class="form-group">
                <h2>Employment Information:</h2>
                <label>Present Employer:</label>
                <input type="text" name="employer" class="form-control <?php echo (!empty($employer_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $employer_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Occupation</label>
                <input type="text" name="occupation" class="form-control <?php echo (!empty($occupation_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $occupation_err; ?></span>
            </div>
            <div class="form-group">
                <label>Years of experience</label>
                <input type="text" name="experience" class="form-control <?php echo (!empty($experience_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $experience_err; ?></span>
            </div>
            <div class="form-group">
                <label>Gross monthly income:</label>
                <input type="text" name="mincome" class="form-control <?php echo (!empty($mincome_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $mincome_err; ?></span>
            </div>
            <div class="form-group">
                <label>Monthly rent/mortgage</label>
                <input type="text" name="rent" class="form-control <?php echo (!empty($rent_err)) ? 'is-invalid' : ''; ?>"> <span class="invalid-feedback"><?php echo $rent_err; ?></span>
            </div>
            <div class="form-group">
                <label>Down Payment Amount</label>
                <input type="text" name="dpayment" class="form-control <?php echo (!empty($dpayment_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $dpayment_err; ?></span>
            </div>
            <div class="form-group">
                <h2>Card Information:</h2>
                <label>Credit Card Number:</label>
                <input type="text" name="ccn" class="form-control <?php echo (!empty($ccn_err)) ? 'is-invalid' : ''; ?>"> <span class="invalid-feedback"><?php echo $ccn_err; ?></span>
            </div>
            <div class="form-group">
                <label>Expiry Date</label>
                <input type="text" name="card_expiry" class="form-control <?php echo (!empty($card_expiry_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $card_expiry_err; ?></span>
            </div>
            <div class="form-group">
                <label>CVV</label>
                <input type="text" name="cvv" class="form-control <?php echo (!empty($cvv_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $cvv_err; ?></span>
            </div>
            <div class="form-group">
                <label>Transaction Limitt</label>
                <input type="text" name="limitt" class="form-control <?php echo (!empty($limitt_err)) ? 'is-invalid' : ''; ?>"> 
                <span class="invalid-feedback"><?php echo $limitt_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
        </form>
    </div>    
</body>
</html>