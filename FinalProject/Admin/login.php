<?php
include '../database/connection.php';
session_start();
class login extends connection
{
    private $admin_name;
    private $admin_password;
    private $query;

    public function admin_access()
    {
        if(isset($_POST['submit']))
            {
                $this->connected();
                $admin_name=$_POST['admin-name'];
                $admin_password=$_POST['admin-pass']; 
                /***** Query ****/
                $query = "SELECT * FROM admin WHERE admin_username='$admin_name' AND password='$admin_password'";
                /**** Executing Query *****/
                $result = $this->connect->query($query);
                /**** checking result ****/
                if($result->num_rows>0)
                {
                    // $row=$result->fetch_assoc();
                    $_SESSION['Login']="yes";
                    header("location:home.php");
                    die();
                }
                else
                {
                    header("location:index.html");
                    die();
                    // echo "Please Go back and enter valid information ";
                }

            }
    }
}
$admin = new login();
$admin->admin_access();
?>