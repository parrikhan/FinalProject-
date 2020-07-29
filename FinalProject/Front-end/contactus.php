<?php
 include 'header.php';
 session_start();
 if(!isset($_SESSION['UserLogin']))
 {
     header("location:index.php");
 }
 ?>
 <section id="Contact-section">
     <div class="container">
        <h2>Contact Us</h2>
        <div class="contact-form">
            <!-- First grid Section -->
            <div>
                <i class="fa fa-map-marker link"></i><span class="form-info">Automotive center Uet Lahore</span><br>
                <i class="fa fa-phone"></i><span class="form-info">Phone no +92 8743462457</span><br>
                <i class="fa fa-envelope"></i><span class="form-info">sairakhanbscs@gmail.com</span>
            </div>
            <!-- Second grid /-->
            <div>
                <form action="contactInsert.php" method="POST">
                    <input type="text" placeholder="Your Name" name="name" required>
                    <input type="email" name="email" placeholder="Your Email" required>
                    <input type="text" name="mobile" placeholder="Your Mobile" required>
                    <input type="text" name="subject" placeholder="Your Subject" required>
                    <textarea name="message" rows="5" required placeholder="Type Message Here" required></textarea>
                    <input type="date"  name="added" placeholder="Select Date" required>
                    <button type="submit" class="submit">Send Message</button>
                </form>
            </div>
        </div>
     </div>
    
 </section>
<?php
 include 'footer.php';
?>