<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    include '../includes/db.php';

    $sql = mysqli_prepare($con, "DELETE FROM CustomerListing WHERE CustomerID = ?");
    mysqli_stmt_bind_param($sql, "s", $id);
    mysqli_stmt_execute($sql);
}

header("Location: index.php");
exit();