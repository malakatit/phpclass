<?php
global $con;
$err = "";
$Username = "";
$Password = "";
$Password2 = "";
$Email = "";
session_start();
include '../includes/db.php';


if(!isset($_SESSION["UID"])){
    header("Location: index.php");
}
if(isset($_POST["btnSubmit"])) {

    $Username = isset($_POST["txtUsername"]) ? trim($_POST["txtUsername"]) : "";
    $Password = isset($_POST["txtPassword"]) ? trim($_POST["txtPassword"]) : "";
    $Password2 = isset($_POST["txtPassword2"]) ? trim($_POST["txtPassword2"]) : "";
    $Role = isset($_POST["txtRole"]) ? $_POST["txtRole"] : "";
    $Email = isset($_POST["txtEmail"]) ? trim($_POST["txtEmail"]) : "";


    if(strlen($Username) < 4){
        $err = "Username must be at least 4 characters long!";
    }

    elseif(strlen($Password) < 4){
        $err = "Password must be at least 4 characters long!";
    }

    // Password match
    elseif($Password !== $Password2){
        $err = "Passwords do not match!";
    }
    elseif(empty($Role)){
        $err = "Role is required!";
    }

    elseif(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
        $err = "Invalid email format!";
    }

    if($err == ""){
        $memberKey = "xxxxxxxxx";

        include '../includes/db.php';

        $sql = mysqli_prepare($con,
            "INSERT INTO memberLogin (memberName, memberEmail, memberPassword, roleID, memberKey) 
             VALUES (?, ?, ?, ?, ?)"
        );

        mysqli_stmt_bind_param($sql, "sssis", $Username, $Email, $Password, $Role, $memberKey);
        mysqli_stmt_execute($sql);

        $err = "Member Added to Database";

        // Clear fields
        $Username = $Password = $Password2 = $Email = "";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Malak's website</title>
    <style>
        .item1 {grid-area: header}
        .item2 {grid-area: Username}
        .item3 {grid-area: UsernameInput}
        .item4 {grid-area: Password}
        .item5 {grid-area: PasswordInput}
        .item6 {grid-area: Password2}
        .item7 {grid-area: Password2Input}
        .item8 {grid-area: Role}
        .item9 {grid-area: RoleInput}
        .item10 {grid-area: Email}
        .item11 {grid-area: EmailInput}
        .item12 {grid-area: footer}

        .gc{
            margin-top: 50px;
            margin-right: auto;
            margin-left: auto;
            display: grid;
            grid-template-areas:
                'header header'
                'Username UsernameInput'
                'Password PasswordInput'
                'Password2 Password2Input'
                'Role RoleInput'
                'Email EmailInput'
                'footer footer'
        ;
            padding: 0px;
            width: 80%;
        }

        div{
            border: 1px solid;
            text-align: center;
            padding: 10px 0;
            font-size: 20px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
</head>
<body>
<?php include('../includes/header.php') ?>
<?php include('../includes/nav.php') ?>

<main>
    <h3> Admin Page </h3>

    <h3 id="err"><?=$err?></h3>

    <form method="post">
        <div class="gc">
            <div class="item1"><h3>Add New Member</h3></div>
            <div class="item2">Username</div>
            <div class="item3"><input type="text" name="txtUsername" id="txtUsername" value="<?=$Username?>" size="60" /></div>
            <div class="item4">Password</div>
            <div class="item5"><input type="password" name="txtPassword" id="txtPassword" value="<?=$Password?>" size="60" /></div>
            <div class="item6">Retype Password</div>
            <div class="item7"><input type="password" name="txtPassword2" id="txtPassword2" value="<?=$Password2?>" size="60"/></div>
            <div class="item8">Role</div>
            <div class="item9">
                <select name="txtRole" id="txtRole">
                    <?php
                    $result = mysqli_query($con, "SELECT roleID, roleValue FROM role");

                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<option value='".$row['roleID']."'>".$row['roleValue']."</option>";
                        }
                    } else {
                        echo "<option value=''>No roles found</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="item10"> Email</div>
            <div class="item11">
                <input type="text" name="txtEmail" id="txtEmail" value="<?=$Email?>" size="60" />
            </div>

            <div class="item12">
                <input type="submit" value="Create new User" name="btnSubmit" />
            </div>

        </div>
    </form>

</main>
<?php include '../includes/footer.php'; ?>
</body>
</html>