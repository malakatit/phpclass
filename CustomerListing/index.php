<?php
// index.php
include '../includes/header.php';
include '../includes/nav.php';
include '../includes/db.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Listing</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <style>
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto 50px;
            table-layout: fixed;
            word-wrap: break-word;
            font-size: 14px; 
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
            overflow: hidden;
            text-overflow: ellipsis; /* shows ... if content still overflows */
            white-space: normal; /* allow text to wrap */
        }

        a {
            text-decoration: none;
            color: blue;
        }

        a:hover {
            text-decoration: underline;
        }

        h3 {
            text-align: center;
        }

        .create-link {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #4CAF50;
            color: white;
            border-radius: 6px;
        }

        .create-link:hover {
            background-color: #45a049;
        }

            overflow-x: auto;
        }
    </style>
</head>
<body>
<main>
    <h3>Customer Listing</h3>

    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Password</th>
        </tr>

        <?php
        try {
            $rs = mysqli_query($con, "SELECT * FROM CustomerListing");
            while($row = mysqli_fetch_assoc($rs)){
                $id = $row['CustomerID'];
                echo "<tr>";
                echo "<td><a href='customerupdate.php?id=$id'>{$row['CustomerID']}</a></td>";
                echo "<td><a href='customerupdate.php?id=$id'>{$row['FirstName']}</a></td>";
                echo "<td><a href='customerupdate.php?id=$id'>{$row['LastName']}</a></td>";
                echo "<td>{$row['Address']}</td>";
                echo "<td>{$row['City']}</td>";
                echo "<td>{$row['State']}</td>";
                echo "<td>{$row['Zip']}</td>";
                echo "<td>{$row['Phone']}</td>";
                echo "<td>{$row['Email']}</td>";
                echo "<td>Secret</td>";
                echo "</tr>";
            }
        } catch(mysqli_sql_exception $ex){
            echo "<tr><td colspan='10'>Error: ".$ex->getMessage()."</td></tr>";
        }
        ?>
    </table>

    <a class="create-link" href="createaccount.php">Create Account</a>
</main>

<?php include '../includes/footer.php'; ?>
</body>
</html>