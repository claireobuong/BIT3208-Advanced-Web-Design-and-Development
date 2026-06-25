<?php

if(session_status() == PHP_SESSION_NONE){

    session_start();

}

$role = $_SESSION["role"] ?? "";
$fullname = $_SESSION["fullname"] ?? "";

?>

<style>

*{

    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;

}

.navbar{

    width:100%;

    background:#245000;

    border-radius:18px;

    padding:18px 30px;

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:30px;

    color:white;

}

.logo{

    display:flex;

    flex-direction:column;

}

.logo h2{

    font-size:30px;

    font-weight:600;

}

.logo span{

    font-size:13px;

    opacity:.85;

}

.right-section{

    display:flex;

    align-items:center;

    gap:30px;

}

.user-box{

    text-align:right;

}

.user-name{

    font-size:15px;

    font-weight:600;

}

.user-role{

    font-size:12px;

    color:#cde8b5;

}

.menu{

    display:flex;

    gap:22px;

}

.menu a{

    text-decoration:none;

    color:white;

    font-size:14px;

    font-weight:500;

    transition:.3s;

}

.menu a:hover{

    color:#d7f5a8;

}

.logout{

    background:#d85d4c;

    padding:10px 18px;

    border-radius:10px;

}

.logout:hover{

    background:#b94435;

    color:white;

}

</style>

<div class="navbar">

    <div class="logo">

        <h2>🗳️ CiviVote Kenya</h2>

        <span>Voter Registration System</span>

    </div>

    <div class="right-section">

        <div class="user-box">

            <div class="user-name">

                <?php echo htmlspecialchars($fullname); ?>

            </div>

            <div class="user-role">

                <?php echo ucfirst($role); ?>

            </div>

        </div>

        <div class="menu">

<?php

if($role == "superadmin"){

?>

<a href="admin_dashboard.php">Dashboard</a>

<a href="add_user.php">Add User</a>

<a href="view_users.php">View Users</a>

<a href="edit_user.php">Edit User</a>

<a href="delete_user.php">Delete User</a>

<?php

}elseif($role == "manager"){

?>

<a href="manager_dashboard.php">Dashboard</a>

<a href="view_users.php">View Users</a>

<?php

}else{

?>

<a href="voter_dashboard.php">Dashboard</a>

<a href="my_profile.php">My Profile</a>

<?php

}

?>

<a class="logout" href="logout.php">Logout</a>

        </div>

    </div>

</div>