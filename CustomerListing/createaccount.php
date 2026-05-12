<?php
// Initialize error variable
$error = "";

// Run only if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form values (consistent variable names)
    $first = trim($_POST["FirstName"]);
    $last = trim($_POST["LastName"]);
    $address = trim($_POST["Address"]);
    $city = trim($_POST["City"]);
    $state = trim($_POST["State"]);
    $zip = trim($_POST["Zip"]);
    $phone = trim($_POST["Phone"]);
    $email = trim($_POST["Email"]);
    $password = $_POST["Password"];
    $confirm = $_POST["Confirm"];

    // ---------------------------
    // SERVER-SIDE VALIDATION
    // ---------------------------

    // Check for empty fields
    if (empty($first) || empty($last) || empty($address) || empty($city) ||
        empty($state) || empty($zip) || empty($phone) || empty($email) ||
        empty($password) || empty($confirm)) {

        $error = "All fields are required.";
    }
    // Validate email format
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    }
    // Check if passwords match
    elseif ($password !== $confirm) {
        $error = "Passwords do not match.";
    }
    else {
        try {
            // Include database connection
            include '../includes/db.php';

            // Generate MemberKey
            $MemberKey = sprintf('%04X%04X%04X%04X',
                mt_rand(0, 65535),
                mt_rand(0, 65535),
                mt_rand(0, 65535),
                mt_rand(0, 65535)
            );

            // Combine password + key
            $combinedPassword = $password . $MemberKey;

            // Hash password
            $hashedPassword = password_hash($combinedPassword, PASSWORD_DEFAULT);

            // Prepare SQL statement
            $sql = mysqli_prepare($con,
                "INSERT INTO CustomerListing (FirstName, LastName, Address, City, State, Zip, Phone, Email, Password, MemberKey) VALUES (?,?,?,?,?,?,?,?,?,?)"
            );


            // Bind parameters
            mysqli_stmt_bind_param($sql, "ssssssssss",
                $first, $last, $address, $city, $state,
                $zip, $phone, $email, $hashedPassword, $MemberKey
            );

            // Execute statement
            mysqli_stmt_execute($sql);

            // Redirect to customer listing page
            header("Location: index.php");
            exit();

        } catch(mysqli_sql_exception $ex){
            $error = $ex->getMessage();
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account</title>
    <style>
        /* Center the form container */
        form {
            display: flex;
            flex-direction: column;
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        /* Space out input fields and labels */
        form input[type="text"],
        form input[type="tel"],
        form input[type="email"],
        form input[type="password"] {
            margin-bottom: 15px;
            padding: 8px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }

        /* Heading styling */
        h2 {
            text-align: center;
        }

        p {
            color: red;
            font-weight: bold;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="/css/base.css">

</head>
<body>
<?php include('../includes/header.php') ?>
<?php include('../includes/nav.php') ?>

<main>
<h2>Create Account</h2>

<!-- Display error if exists -->
<?php if($error != "") echo "<p>$error</p>"; ?>

<form method="post">

    First Name:
    <input type="text" name="FirstName" required pattern="[A-Za-z]{2,}" title="Only letters, minimum 2 characters">

    Last Name:
    <input type="text" name="LastName" required pattern="[A-Za-z]{2,}"/>

    Address:
    <input type="text" name="Address" required />

    City:
    <input type="text" name="City" required/>

    State:
    <input type="text" name="State" maxlength="2" required pattern="[A-Za-z]{2}"/>

    Zip:
    <input type="text" name="Zip" required pattern="[0-9]{5}"/>

    Phone:
    <input type="tel" name="Phone" required pattern="[0-9]{10}" title="Enter 10 digit phone number"/>

    Email:
    <input type="email" name="Email" required/>

    Password:
    <input type="password" name="Password" required minlength="6"/>

    Confirm Password:
    <input type="password" name="Confirm" required minlength="6"/>

    <input type="submit" value="Create Account"/>

</form>

<br>
<a href="index.php">Back to Customer List</a>

</main>
<?php include('../includes/footer.php') ?>
</body>
</html>