<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "week6db"
);

$message = "";

if(isset($_GET['delete'])){

    $id = $_GET['delete'];

    mysqli_query(
        $conn,
        "DELETE FROM students WHERE id='$id'"
    );

    $message = "Student Record Deleted Successfully";
}

$result = mysqli_query(
    $conn,
    "SELECT * FROM students"
);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Delete Students</title>

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
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

h1{
    text-align:center;
    color:#245000;
    font-size:28px;
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
    padding:16px;
    font-size:13px;
}

td{
    padding:15px;
    text-align:center;
    font-size:12px;
    color:#35551f;
    border-bottom:1px solid #e5e5e5;
}

.delete-btn{
    background:#c0392b;
    color:white;
    padding:10px 18px;
    border-radius:25px;
    text-decoration:none;
    font-size:12px;
}

.delete-btn:hover{
    background:#a93226;
}

</style>

</head>

<body>

<div class="container">

<h1>Delete Student Records</h1>

<div class="subtitle">

Remove student records from the database.

</div>

<div class="message">

<?php echo $message; ?>

</div>

<table>

<tr>

<th>ID</th>

<th>Full Name</th>

<th>Email</th>

<th>Course</th>

<th>Delete</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['fullname']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['course']; ?></td>

<td>

<a
class="delete-btn"
href="delete_student.php?delete=<?php echo $row['id']; ?>"
onclick="return confirm('Are you sure you want to delete this student?');">

Delete

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>