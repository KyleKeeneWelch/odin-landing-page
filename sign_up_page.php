<?php require("scripts/sign_up_script.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scripts/main.js"></script>
    <link rel="stylesheet" href="styles/main.css">
    <title>Sign Up</title>
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

        <section>
            <br>
            <h2>Upcoming products and services by Blue Ridge Head Co.</h2>
            <br>
            <div class="upcoming-product-container">
                <img src="assets/images/product-crop.png">
                <div>
                    <h3>Blue Ridge Shampoo</h3>
                    <p>
                        Our finest creation coming to you soon; the Blue Ridge Shampoo offers a cleaner, fragrant option to wash and cleanse your hair.
                    </p>
                    <p>
                        Experience an esteemed look for only £9.99 coming to you soon! <a href="#sign_up">Sign up</a> to receive updates when the product drops and at retailers near you.
                    </p>
                </div>
            </div>
            <br>
            <div class="upcoming-product-container">
                <img src="assets/images/product-crop.png">
                <div>
                    <h3>Blue Ridge Beauty Kit</h3>
                    <p>
                        Looking for an affordable beauty option to spice up your looks? Check out the Blue Ridge Beauty Kit and what's provided to see if you will reap the benefits.
                    </p>
                    <p>
                        Get the latest look with our upcoming Beauty Kit for only £15.99! <a href="#sign_up">Sign up</a> to receive updates when the product drops and at retailers near you.
                    </p>
                </div>
            </div>
            <br>
            <div class="upcoming-product-container">
                <img src="assets/images/product-crop.png">
                <div>
                    <h3>Blue Ridge Pamper Set</h3>
                    <p>
                        The perfect set to take care of your body whether you require a slight trim or a deep shave, the Blue Ridge Pamper Set has you covered.
                    </p>
                    <p>
                        Providing all the high quality utensils for all your pampering needs, the Blue Ridge Pamper Set will meet all your needs for only £19.99! <a href="#sign_up">Sign up</a> to receive updates when the product drops and at retailers near you.
                    </p>
                </div>
            </div>
        </section>
        <br>
        <h2>Interested? Sign Up Now!</h2>
        <br>
        <section class="form_container">
            <!-- Send to same address. Require links PHP variables of script to page. -->
            <form action="" method="POST" id="sign_up">
                <!-- Display error message. -->
                <span style="color: red; display: block;"><?php echo $nameErr;?></span>
                <label for="name">Name:</label>
                <br>
                <!-- Value attribute provides previously entered value. -->
                <input name="name" type="text" placeholder="Enter your name..." value="<?php echo $name ?>">
                <br><br>
                <span style="color: red; display: block;"><?php echo $emailErr;?></span>
                <label for="email">Email:</label>
                <br>
                <input name="email" type="text" placeholder="Enter your email..." value="<?php echo $email ?>">
                <br><br>
                <span style="color: red; display: block;"><?php echo $contact_numberErr;?></span>
                <label for="contact_number">Contact Number:</label>
                <br>
                <input name="contact_number" type="tel" placeholder="Enter your contact number..." value="<?php echo $contact_number ?>">
                <br><br>
                <span style="color: red; display: block;"><?php echo $contact_methodErr;?></span>
                <p>How would you like Blue Ridge Head Co. to contact you about updates and services?</p>
                <!-- Checkbox group. Apply checked attribute if array contains value. -->
                <input type="checkbox" name="contact_method[]" value="email" <?=(in_array("email", $contact_method) ? "checked='checked'" : '') ?> />
                <label for="contact_method[]">Reach me by my email</label>
                <br>
                <input type="checkbox" name="contact_method[]" value="contact_number" <?=(in_array("contact_number", $contact_method) ? "checked='checked'" : '') ?> />
                <label for="contact_method[]">Reach me by my contact number</label>
                <br><br>
                <button type="submit">Submit</button>
            </form>
        </section>
        <br>
        <footer>
            Copyright &copy; 2023
        </footer>
    </main>
</body>
</html>