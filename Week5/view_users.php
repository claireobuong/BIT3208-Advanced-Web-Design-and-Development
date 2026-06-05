<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "week5db"
);

$result = mysqli_query(
    $conn,
    "SELECT * FROM users"
);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>View Users</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

body{
    margin:0;
    padding:40px;

    font-family:'Poppins', sans-serif;

    background:#eef1e8;
}

.container{
    width:85%;

    margin:auto;

    background:#b8d98a;

    padding:40px;

    border-radius:40px;

    box-shadow:
    0 10px 30px rgba(0,0,0,0.08);
}

h1{
    text-align:center;

    color:#245000;

    font-size:30px;

    margin-bottom:10px;
}

.subtitle{
    text-align:center;

    color:#4b5d36;

    font-size:13px;

    margin-bottom:35px;
}

table{
    width:100%;

    border-collapse:collapse;

    background:white;

    border-radius:25px;

    overflow:hidden;
}

th{
    background:#245000;

    color:white;

    padding:18px;

    font-size:13px;
}

td{
    padding:16px;

    text-align:center;

    font-size:12px;

    color:#35551f;

    border-bottom:1px solid #e5e5e5;
}

tr:hover{
    background:#f6f9f2;
}

</style>

</head>

<body>

<div class="container">

    <h1>
        Registered Users
    </h1>

    <div class="subtitle">

        Viewing records retrieved
        dynamically from the database.

    </div>

    <table>

        <tr>

            <th>ID</th>

            <th>Username</th>

            <th>Password</th>

        </tr>

        <?php

        while($row = mysqli_fetch_assoc($result)){

        ?>

        <tr>

            <td>
                <?php echo $row['id']; ?>
            </td>

            <td>
                <?php echo $row['username']; ?>
            </td>

            <td>
                ********
            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>

</html>