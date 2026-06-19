<?php

session_start();

if(!isset($_SESSION['employee_id'])){

    header("Location: employee_login.php");
    exit();

}

include("employee_db_connection.php");

if(isset($_GET['id'])){

    $id = intval($_GET['id']);

    $stmt = $conn->prepare(

        "DELETE FROM employees WHERE id=?"

    );

    $stmt->bind_param(

        "i",

        $id

    );

    $stmt->execute();

    $stmt->close();

}

header("Location: view_employees.php");

exit();

?>