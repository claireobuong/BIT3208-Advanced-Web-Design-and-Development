<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "week5db"
);

$message = "";

if(isset($_GET['delete'])){

    $id = $_GET['delete'];

    mysqli_query(
        $conn,
        "DELETE FROM users WHERE id='$id'"
    );

    $message = "User Deleted Successfully";
}

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

<title>Delete Users</title>

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

    margin-bottom:30px;
}

.message{
    text-align:center;

    color:#245000;

    font-size:12px;

    margin-bottom:20px;

    font-weight:500;
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

.delete-btn{
    padding:10px 18px;

    border:none;

    border-radius:25px;

    background:#245000;

    color:white;

    font-size:12px;

    text-decoration:none;

    display:inline-block;

    transition:0.3s;
}

.delete-btn:hover{
    background:#336600;
}

</style>

</head>

<body>

<div class="container">

    <h1>
        Delete Users
    </h1>

    <div class="subtitle">

        Removing user records
        from the system database.

    </div>

    <div class="message">
        <?php echo $message; ?>
    </div>

    <table>

        <tr>

            <th>ID</th>

            <th>Username</th>

            <th>Password</th>

            <th>Delete</th>

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

            <td>

                <a

                class="delete-btn"

                href="delete_user.php?delete=<?php echo $row['id']; ?>"

                >

                    Delete

                </a>

            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>

</html>