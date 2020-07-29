<?php
include 'header.php';
session_start();
class loginUser extends connection
 {
    private $email;
    private $password;
    
    public function login()
    {
        $this->connected();
        $this->email=$_POST['email'];
        $this->password=$_POST['password'];
        // echo $this->email,$this->password;
        $query = "SELECT * FROM user WHERE email='$this->email' AND password='$this->password'";
        /**** Executing Query *****/
        $result = $this->connect->query($query);
        /**** checking result ****/
        if($result->num_rows>0)
        {
            $_SESSION['UserLogin']="yes";
            header("location:contactus.php");
            die();
        }
        else
        {
            header("location:index.php");
            die();
            // echo "Please Go back and enter valid information ";
        }
    }
 }

$login = new loginUser();
$login->login();
include 'footer.php';
?>