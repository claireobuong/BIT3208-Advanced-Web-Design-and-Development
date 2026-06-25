<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CiviVote Kenya | Database Connection</title>

<!-- Google Font -->

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<!-- Shared Styles -->

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="circle1"></div>
    <div class="circle2"></div>

    <!-- Header -->

    <div class="header">

        <h1>CiviVote Kenya</h1>

        <p>

            Database Connection Test

        </p>

    </div>

    <!-- Information Grid -->

    <div class="info-grid">

        <div class="box">

            <div class="title">

                System Name

            </div>

            <div class="content">

                Voter Registration System

            </div>

        </div>

        <div class="box">

            <div class="title">

                Database Name

            </div>

            <div class="content">

                week3db

            </div>

        </div>

    </div>

    <!-- Connection Information -->

    <div class="box full-box">

        <div class="title">

            Connection Information

        </div>

        <div class="content">

            Server Name: localhost

            <br><br>

            Username: root

            <br><br>

            Password: Empty

            <br><br>

            Connection Type: PHP + MySQL

        </div>

    </div>

    <!-- Connection Status -->

    <div class="status">

        <?php

        $conn = mysqli_connect(

            "localhost",
            "root",
            "",
            "week3db"

        );

        if($conn){

            echo "<div class='success'>
                    Connected Successfully
                  </div>";

            mysqli_close($conn);

        }

        else{

            echo "<div class='error'>
                    Connection Failed
                  </div>";

        }

        ?>

    </div>

    <!-- Footer -->

    <div class="footer">

        © <?php echo date("Y"); ?> CiviVote Kenya. All Rights Reserved.

    </div>

</div>

<!-- Shared JavaScript -->

<script src="script.js"></script>

</body>

</html>