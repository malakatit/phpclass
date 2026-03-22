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
            width: 60%;
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

    <h3 id="err"><?=$msg?></h3>

    <form method="get">
        <div class="gc">
            <div class="item1"><h3>Add New Member</h3></div>
            <div class="item2">Username</div>
            <div class="item3"><input type="text" name="txtUsername" id="txtUsername" size="60"/></div>
            <div class="item4">Password</div>
            <div class="item5"><input type="password" name="txtPassword" id="txtPassword" size="60"/></div>
            <div class="item6">Retype Password</div>
            <div class="item7"><input type="password" name="txtPassword2" id="txtPassword2" size="60"/></div>
            <div class="item8">Role</div>
            <div class="item9">
                <select name="txtRole" id="txtRole">
                    <option value="1">Admin</option>
                    <option value="2">Operator</option>
                    <option value="3">Member</option>
                </select>

            </div>
            <div class="item10"> Email</div>
            <div class="item11"><input type="text" name="txtEmail" id="txtEmail" size="60"/></div>
            <div class="item12"><input type="submit" value="Create new User" name="btnSubmit" /></div>
        </div>
    </form>

</main>
<?php include('../includes/footer.php') ?>
</body>
</html>