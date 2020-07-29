<?php
include 'header.php';
?>
<section id="Register-Section">
    <div class="container">
        <h2>Login</h2>
        <div class="text-center mt-5">
            <form action="loginUser.php" method="POST">
                <input type="email" name="email" placeholder="Your Email" required>
                <input type="text" name="password" placeholder="Password" required>
                <button type="submit" class="submit">Login</button>
                <p class="mt-3 text-white">If not registered,<a href="register.php">register</a></p>
            </form>
        </div>
    </div>
</section>
<?php
include 'footer.php';
?>