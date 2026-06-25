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
    gap:20px;
    margin-bottom:30px;
    color:white;
    flex-wrap:wrap;
}

.logo{
    display:flex;
    align-items:center;
    gap:15px;
}

.logo-image{
    width:70px;
    height:70px;
    object-fit:contain;
    border-radius:10px;
    flex-shrink:0;
}

.logo h2{
    font-size:28px;
    font-weight:600;
    margin:0;
}

.logo span{
    display:block;
    font-size:13px;
    opacity:.85;
}

.right-section{
    display:flex;
    align-items:center;
    justify-content:flex-end;
    gap:25px;
    flex:1;
    flex-wrap:wrap;
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
    gap:15px;
    flex-wrap:wrap;
    align-items:center;
}

.menu a{
    text-decoration:none;
    color:white;
    font-size:14px;
    font-weight:500;
    padding:8px 12px;
    border-radius:8px;
    transition:.3s;
}

.menu a:hover{
    background:rgba(255,255,255,.12);
    color:#d7f5a8;
}

.logout{
    background:#d85d4c;
}

.logout:hover{
    background:#b94435;
    color:white;
}

/* ==========================
   Tablet
========================== */

@media (max-width:1024px){

.navbar{
    padding:18px;
}

.right-section{
    width:100%;
    justify-content:space-between;
}

.menu{
    gap:10px;
}

.logo-image{
    width:60px;
    height:60px;
}

.logo h2{
    font-size:24px;
}

}

/* ==========================
   Mobile
========================== */

@media (max-width:768px){

.navbar{
    flex-direction:column;
    align-items:flex-start;
}

.logo{
    width:100%;
}

.logo-image{
    width:55px;
    height:55px;
}

.logo h2{
    font-size:22px;
}

.logo span{
    font-size:12px;
}

.right-section{
    width:100%;
    flex-direction:column;
    align-items:flex-start;
    gap:15px;
}

.user-box{
    text-align:left;
}

.menu{
    width:100%;
    flex-direction:column;
    align-items:stretch;
}

.menu a{
    width:100%;
    display:block;
    padding:12px;
    background:rgba(255,255,255,.08);
}

.logout{
    text-align:center;
}

}

</style>

<div class="navbar">

    <div class="logo">

        <img
            src="images/logo.jpg"
            alt="CiviVote Kenya Logo"
            class="logo-image"
        >

        <div>

            <h2>CiviVote Kenya</h2>

            <span>Voter Registration System</span>

        </div>

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

<a href="about.php">About</a>

<a href="services.php">Services</a>

<a href="training.php">Voter Education</a>

<a href="contact.php">Contact</a>

<a href="add_user.php">Add User</a>

<a href="view_users.php">View Users</a>

<a href="edit_user.php">Edit User</a>

<a href="delete_user.php">Delete User</a>

<?php

}elseif($role == "manager"){

?>

<a href="manager_dashboard.php">Dashboard</a>

<a href="about.php">About</a>

<a href="services.php">Services</a>

<a href="training.php">Voter Education</a>

<a href="contact.php">Contact</a>

<a href="view_users.php">View Users</a>

<?php

}else{

?>

<a href="voter_dashboard.php">Dashboard</a>

<a href="about.php">About</a>

<a href="services.php">Services</a>

<a href="training.php">Voter Education</a>

<a href="contact.php">Contact</a>

<a href="my_profile.php">My Profile</a>

<?php

}

?>

<a class="logout" href="logout.php">Logout</a>

        </div>

    </div>

</div>