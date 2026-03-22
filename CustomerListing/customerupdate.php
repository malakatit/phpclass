<?php
// customerupdate.php

if(!empty($_POST["txtFirst"])){
    if(!empty($_POST["txtLast"])){

        $txtFirst = $_POST["txtFirst"];
        $txtLast = $_POST["txtLast"];
        $txtAddress = $_POST["txtAddress"];
        $txtCity = $_POST["txtCity"];
        $txtState = $_POST["txtState"];
        $txtZip = $_POST["txtZip"];
        $txtPhone = $_POST["txtPhone"];
        $txtEmail = $_POST["txtEmail"];
        $txtID = $_POST["txtID"];

        try {
            include '../includes/db.php';

            $sql = mysqli_prepare($con, "UPDATE CustomerListing 
                SET FirstName=?, LastName=?, Address=?, City=?, State=?, Zip=?, Phone=?, Email=? 
                WHERE CustomerID=?");
            mysqli_stmt_bind_param($sql, "sssssssss",
                $txtFirst, $txtLast, $txtAddress, $txtCity, $txtState, $txtZip, $txtPhone, $txtEmail, $txtID
            );
            mysqli_stmt_execute($sql);

            header("Location: index.php");
            exit();
        }
        catch (mysqli_sql_exception $ex){
            echo $ex;
        }
    }
}

if (isset($_GET["id"])){
    $id = $_GET["id"];

    include '../includes/db.php';

    $sql = mysqli_prepare($con, "SELECT * FROM CustomerListing WHERE CustomerID = ?");
    mysqli_stmt_bind_param($sql, "s", $id);
    mysqli_stmt_execute($sql);
    $result = mysqli_stmt_get_result($sql);
    $row = mysqli_fetch_array($result);

    $txtFirst = $row["FirstName"];
    $txtLast = $row["LastName"];
    $txtAddress = $row["Address"];
    $txtCity = $row["City"];
    $txtState = $row["State"];
    $txtZip = $row["Zip"];
    $txtPhone = $row["Phone"];
    $txtEmail = $row["Email"];
}else{
    header("Location: index.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Customer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">
        function DeleteCustomer(first,last,id){
            if (confirm("Are you sure you want to DELETE " + first + " " + last + "?" )){
                document.location.href = 'customerdelete.php?id=' + id;
            }
        }
    </script>

    <link rel="stylesheet" href="/css/base.css">
    <style>
        .item1 {grid-area: header}
        .item2 {grid-area: FirstNameLabel}
        .item3 {grid-area: FirstNameInput}
        .item4 {grid-area: LastNameLabel}
        .item5 {grid-area: LastNameInput}
        .item6 {grid-area: AddressLabel}
        .item7 {grid-area: AddressInput}
        .item8 {grid-area: CityLabel}
        .item9 {grid-area: CityInput}
        .item10 {grid-area: StateLabel}
        .item11 {grid-area: StateInput}
        .item12 {grid-area: ZipLabel}
        .item13 {grid-area: ZipInput}
        .item14 {grid-area: PhoneLabel}
        .item15 {grid-area: PhoneInput}
        .item16 {grid-area: EmailLabel}
        .item17 {grid-area: EmailInput}
        .item18 {grid-area: footer}

        .gc{
            margin-top: 50px;
            display: grid;
            grid-template-areas:
                'header header'
                'FirstNameLabel FirstNameInput'
                'LastNameLabel LastNameInput'
                'AddressLabel AddressInput'
                'CityLabel CityInput'
                'StateLabel StateInput'
                'ZipLabel ZipInput'
                'PhoneLabel PhoneInput'
                'EmailLabel EmailInput'
                'footer footer';
            padding: 0px;
            grid-gap: 10px;
        }

        div{
            border: 1px solid;
            text-align: center;
            padding: 10px 0;
            font-size: 18px;
        }

        input[type="text"], input[type="email"]{
            width: 95%;
            padding:5px;
        }
    </style>
</head>
<body>
<header>
    <?php include('../includes/header.php') ?>
</header>
<nav>
    <?php include('../includes/nav.php') ?>
</nav>
<main>

    <form method="post">
        <div class="gc">
            <div class="item1"><h3>Update Customer</h3></div>

            <div class="item2">First Name</div>
            <div class="item3"><input type="text" name="txtFirst" value="<?=$txtFirst?>" /></div>

            <div class="item4">Last Name</div>
            <div class="item5"><input type="text" name="txtLast" value="<?=$txtLast?>" /></div>

            <div class="item6">Address</div>
            <div class="item7"><input type="text" name="txtAddress" value="<?=$txtAddress?>" /></div>

            <div class="item8">City</div>
            <div class="item9"><input type="text" name="txtCity" value="<?=$txtCity?>" /></div>

            <div class="item10">State</div>
            <div class="item11"><input type="text" name="txtState" maxlength="2" value="<?=$txtState?>" /></div>

            <div class="item12">Zip</div>
            <div class="item13"><input type="text" name="txtZip" value="<?=$txtZip?>" /></div>

            <div class="item14">Phone</div>
            <div class="item15"><input type="text" name="txtPhone" value="<?=$txtPhone?>" /></div>

            <div class="item16">Email</div>
            <div class="item17"><input type="email" name="txtEmail" value="<?=$txtEmail?>" /></div>

            <div class="item18">
                <input type="hidden" name="txtID" value="<?=$id?>" />
                <input type="submit" value="Update Customer" /> |
                <input type="button" value="Delete Customer" onclick="DeleteCustomer('<?=$txtFirst?>','<?=$txtLast?>','<?=$id?>')" />
            </div>
        </div>
    </form>

</main>
<?php include('../includes/footer.php') ?>
</body>
</html>