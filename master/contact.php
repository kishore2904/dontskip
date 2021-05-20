<?php include('partials/header.php');?>
<section class="contact">
    <div class="content">
        <h2>Contact Us</h2>
        <p>You can feel free to contact us</p>
    </div>
    <div class="container1">
        <div class="contact-info">
            <div class="box">
                <div class="icon"><ion-icon name="location-outline"></ion-icon></div>
                <div class="text">
                    <h3>Address</h3>
                    <p>Don't Skip</p>
                    <p>Reg: 60/69, Mohamediyar Street, <br> Varaganeri Tiruchirappalli, <br> Tamil Nadu-620008.</p>
                </div>
                
            </div>
            <div class="box">
                <div class="icon"><ion-icon name="location-outline"></ion-icon></div>
                <div class="text">
                    <h3>Experience center:</h3>
                    <p>#42, Tabs Complex, 3rd Floor,Bharathidasan Salai, Cantonment, </p>
                    <p>Tiruchirappalli, <br> Tamil Nadu-620001.</p>
                </div>
                
            </div>
            <div class="box">
                <div class="icon"><ion-icon name="call-outline"></ion-icon></div>
                <div class="text">
                    <h3>Phone</h3>
                    <p><a href="tel:+91 8122681225">+91 8122681225</a></p>
                </div>
            </div>
            <div class="box">
                <div class="icon"><ion-icon name="mail-outline"></ion-icon></div>
                <div class="text">
                    <h3>Email</h3>
                    <p><a href="mailto:dontskip.in@gmail.com">dontskip.in@gmail.com</a></p>
                    <p><a href="mailto:AVenquiry@dontskip.in">AVenquiry@dontskip.in</a></p>
                    <p><a href="mailto:Acousticsenquiry@dontskip.in">Acousticsenquiry@dontskip.in</a></p>
                </div>
            </div>
        </div>
        <div class="contact-form">
            <form action="functions/contact-form.php" method="POST">
                <h2>Send Feedback</h2>
                <div class="inputBox">
                    <input type="text" name="full_name" required="required">
                    <span>Full Name</span>
                </div>
                <div class="inputBox">
                    <input type="email" name="email" required="required">
                    <span>Email</span>
                </div>
                <div class="inputBox">
                    <input type="text" name="phone_number" required="required">
                    <span>Phone Number</span>
                </div>
                <div class="inputBox">
                    <textarea required="required" name="text"></textarea>
                    <span>Type your Message....</span>
                </div>
                <div class="inputBox">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</section>
<?php include('partials/footer.php');?>