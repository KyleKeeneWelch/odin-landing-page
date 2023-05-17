<?php require("scripts/contact_script.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scripts/main.js"></script>
    <link rel="stylesheet" href="styles/main.css">
    <title>Contact Us</title>
</head>
<body>
    <main>
        <nav class="nav">
            <h1><a href="index.html">Blue Ridge Head Co.</a></h1>

            <!-- Navigation with burger menu. -->
            <div class="topnav" id="myTopnav">
                <a href="javascript:void(0);" class="icon" onclick="ResponsiveMenu()">&#9776;</a>
                <a href="index.html">Product</a>
                <a href="sign_up_page.php">Sign Up</a>
                <a href="contact_page.php">Contact</a>
            </div>
        </nav>
        <br>
        <h2>Leave Us a Message</h2>
        <br>
        <section class="form_container">
            <!-- Send to same address. Require links PHP variables of script to page. -->
            <form action="" method="POST">
                <!-- Display error message. -->
                <span style="color: red; display: block;"><?php echo $nameErr;?></span>
                <label for="name">Name:</label>
                <br>
                <!-- Value attribute provides previously entered value. -->
                <input name="name" type="text" placeholder="Enter your name..." value="<?php echo $name ?>" />
                <br><br>
                <span style="color: red; display: block;"><?php echo $emailErr;?></span>
                <label for="email">Email:</label>
                <br>
                <input name="email" type="text" placeholder="Enter your email..." value="<?php echo $email ?>" />
                <br><br>
                <span style="color: red; display: block;"><?php echo $messageErr;?></span>
                <label for="message">Message:</label>
                <br>
                <textarea name="message" rows="5" cols="50" placeholder="Enter your message..."><?php echo $message ?></textarea>
                <br><br>
                <button type="submit">Submit</button>
            </form>
        </section>
        <br>
        <h2>Or Find Us Here</h2>
        <br>
        <section class="social-links-container">
            <a href="https://twitter.com/home">
                <img src="assets/images/twitter.png" alt="Twitter Logo">
            </a>
            <a href="https://www.instagram.com/">
                <img src="assets/images/instagram.png" alt="Instagram Logo">
            </a>
            <a href="https://en-gb.facebook.com/">
                <img src="assets/images/facebook.png" alt="Facebook Logo">
            </a>
            <a href="https://www.tiktok.com/en/">
                <img src="assets/images/tiktok.png" alt="TikTok Logo">
            </a>
        </section>
        <br>
        <footer>
            Copyright &copy; 2023
        </footer>
    </main>
</body>
</html>