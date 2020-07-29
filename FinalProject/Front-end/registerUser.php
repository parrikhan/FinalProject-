<?php
include 'header.php';
class registerUser extends connection
 {
     private $name;
     private $email;
     private $mobile;
     private $password;
     private $date;
    
     public function register()
     {
        $this->connected();

        $this->name=$_POST['name'];
        $this->email=$_POST['email'];
        $this->mobile=$_POST['mobile'];
        $this->password=$_POST['password'];
        $this->date=date('y/m/d');
        $Query = "Select * from user WHERE email='$this->email'";
        $result = $this->connect->query($Query);
        if($result->num_rows>0)
        {
            echo "This Email exists !!!";
        }
        else
        {
            $Query = " INSERT INTO user(name,email,mobile,password,Status,added_on) VALUES 
            ('$this->name','$this->email','$this->mobile','$this->password',1,'$this->date')";
            if($this->connect->query($Query)===TRUE)
            {
                // echo "Registered Successfully !!!";
                header("location:login.php");
            }
            else 
            {
                echo "An error has occured !!!";
            }

        }
    }
 }

$register = new registerUser();
$register->register();
include 'footer.php';
?>