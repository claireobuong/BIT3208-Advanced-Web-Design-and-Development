<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CiviVote Kenya</title>

    <!-- Google Font -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Shared Styles -->

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="page-wrapper">

    <section class="hero-card">

        <div class="circle1"></div>
        <div class="circle2"></div>

        <div class="hero-content">

            <h1>CiviVote Kenya</h1>

            <p class="subtitle">

                Voter Registration System

            </p>

            <!-- Information Cards -->

            <div class="info-grid">

                <div class="card">

                    <h3>System Name</h3>

                    <p>

                        <?php

                        $systemName = "Voter Registration System";

                        echo $systemName;

                        ?>

                    </p>

                </div>

                <div class="card">

                    <h3>Programming Language</h3>

                    <p>

                        <?php

                        $language = "PHP";

                        echo $language;

                        ?>

                    </p>

                </div>

            </div>

            <!-- Welcome Message -->

            <div class="card full-box">

                <h3>Welcome Message</h3>

                <p>

                    <?php

                    echo "Welcome to the CiviVote Kenya Voter Registration System. This page demonstrates PHP syntax, variables, echo statements and dynamic content generation.";

                    ?>

                </p>

            </div>

            <!-- Current Year -->

            <div class="card full-box">

                <h3>Current Year</h3>

                <p>

                    <?php

                    echo date("Y");

                    ?>

                </p>

            </div>

        </div>

    </section>

    <footer>

        © <?php echo date("Y"); ?> CiviVote Kenya. All Rights Reserved.

    </footer>

</div>

<script src="script.js"></script>

</body>

</html>