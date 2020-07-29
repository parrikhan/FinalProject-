<?php
include '../../header.php';
class user_status extends connection{
    private $status=1;
    public function setStatus()
    {
        $fetched_status = $_REQUEST['Status'];
        $id = $_REQUEST['ID'];
        // echo $fetched_status,$id;
        if($fetched_status == 0 || $fetched_status == 1)
        {
            if($fetched_status == 1)
            {
                $this->status = 0;
            }
            $this->connected();
            $query="UPDATE user SET status='$this->status' where id = '$id'";
            //******************** Executing query **************/
            if($this->connect->query($query) === true)
            {
                // echo " Status updated !!!";
                header("location:user.php");
            }
            else{
                echo "Error occured";
            }
            
        }
    }

}
$setStatus = new user_status();
$setStatus->setStatus();

include '../../footer.php';
?>