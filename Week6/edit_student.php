<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "week6db"
);

$message = "";

if(isset($_POST['update'])){

    $id = $_POST['id'];

    $fullname = $_POST['fullname'];

    $email = $_POST['email'];

    $course = $_POST['course'];

    mysqli_query(

        $conn,

        "UPDATE students

        SET
        fullname='$fullname',
        email='$email',
        course='$course'

        WHERE id='$id'"
    );

    $message = "Student Information Updated Successfully";
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

<title>Edit Students</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

body{
    margin:0;
    padding:40px;
    font-family:'Poppins', sans-serif;
    background:#eef1e8;
}

.container{
    width:90%;
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

input{
    width:95%;
    padding:10px;
    border:none;
    border-radius:20px;
    background:#f3f3f3;
    font-size:12px;
    outline:none;
    box-sizing:border-box;
}

button{
    padding:10px 18px;
    border:none;
    border-radius:25px;
    background:#245000;
    color:white;
    font-size:12px;
    cursor:pointer;
}

button:hover{
    background:#336600;
}

</style>

</head>

<body>

<div class="container">

<h1>Edit Student Information</h1>

<div class="subtitle">

Update student records stored in the database.

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

<th>Update</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<form method="POST">

<td>

<?php echo $row['id']; ?>

<input
type="hidden"
name="id"
value="<?php echo $row['id']; ?>">

</td>

<td>

<input
type="text"
name="fullname"
value="<?php echo $row['fullname']; ?>">

</td>

<td>

<input
type="email"
name="email"
value="<?php echo $row['email']; ?>">

</td>

<td>

<input
type="text"
name="course"
value="<?php echo $row['course']; ?>">

</td>

<td>

<button
type="submit"
name="update">

Update

</button>

</td>

</form>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>