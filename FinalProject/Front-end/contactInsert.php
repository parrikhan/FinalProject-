<?php
include 'header.php';
class contactInsert extends connection
 {
     private $name;
     private $email;
     private $mobile;
     private $subject;
     private $message;
     private $added_on;
    
     public function Contact()
     {
        $this->connected();
        $this->name=$_POST['name'];
        $this->email=$_POST['email'];
        $this->mobile=$_POST['mobile'];
        $this->subject=$_POST['subject'];
        $this->message=$_POST['message'];
        $this->added_on=$_POST['added'];


        $Query = "INSERT INTO contactus (name,email,mobile,subject,message,added_on) VALUES 
                ('$this->name','$this->email','$this->mobile','$this->subject','$this->message','$this->added_on')";
            if($this->connect->query($Query)===TRUE)
            {
                echo "Contact inserted Successfully !!!";
                header("location:index.php");
            }
            else 
            {
                echo "An error has occured !!!";
            }
    }
 }

$addContact = new contactInsert();
$addContact->Contact();
include 'footer.php';
?>