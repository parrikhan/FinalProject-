<?php
include 'header.php';
?>
<section id="Register-Section">
    <div class="container">
        <h2>Register Now</h2>
        <div class="text-center mt-5">
            <form action="registerUser.php" method="POST">
                <input type="text" placeholder="Your Name" name="name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <input type="text" name="mobile" placeholder="Your Mobile" required>
                <input type="text" name="password" placeholder="Password" required>
                <button type="submit" class="submit">Register</button>
            </form>
        </div>
    </div>
</section>
<?php
include 'footer.php';
?>