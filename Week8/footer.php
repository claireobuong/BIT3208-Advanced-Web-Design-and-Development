<style>

.footer{

    margin-top:60px;

    background:#245000;

    color:white;

    border-radius:20px;

    padding:35px;

}

.footer-container{

    display:flex;

    justify-content:space-between;

    flex-wrap:wrap;

    gap:30px;

}

.footer-section{

    flex:1;

    min-width:220px;

}

.footer-section h3{

    margin-bottom:15px;

    font-size:18px;

}

.footer-section p{

    line-height:1.8;

    font-size:14px;

    color:#d9e8c8;

}

.footer-section a{

    display:block;

    color:#d9e8c8;

    text-decoration:none;

    margin-bottom:8px;

    transition:.3s;

}

.footer-section a:hover{

    color:white;

}

.footer-bottom{

    margin-top:30px;

    padding-top:20px;

    border-top:1px solid rgba(255,255,255,.2);

    text-align:center;

    font-size:13px;

    color:#d9e8c8;

}

@media(max-width:768px){

.footer-container{

    flex-direction:column;

}

}

</style>

<footer class="footer">

    <div class="footer-container">

        <div class="footer-section">

            <h3>CiviVote Kenya</h3>

            <p>

                A secure online voter registration system designed to simplify voter registration, improve accessibility, and support transparent electoral processes.

            </p>

        </div>

        <div class="footer-section">

            <h3>Quick Links</h3>

            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="services.php">Services</a>
            <a href="training.php">Voter Education</a>
            <a href="contact.php">Contact</a>

        </div>

        <div class="footer-section">

            <h3>Contact</h3>

            <p>Email: support@civivote.co.ke</p>

            <p>Phone: +254 700 123 456</p>

            <p>Nairobi, Kenya</p>

        </div>

    </div>

    <div class="footer-bottom">

        © <?php echo date("Y"); ?> CiviVote Kenya. All Rights Reserved.

    </div>

</footer>