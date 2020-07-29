<?php
include '../../header.php';
class deleteContact extends connection
{
    private $delete;
    
    public function delete_Contact()
    {
        $this->connected();
        $deleteQuery = "DELETE FROM contactus WHERE id = '$this->delete'";
        if($this->connect->query($deleteQuery)===TRUE)
        {
            // echo "Record is Deleted Successfully !!!";
            header("location:contactUs.php");
        }
        else 
        {
            echo "An error has occured !!!";
        }

    }
    public function getValue()
    {
        $this->delete = $_REQUEST['ID'];
    }
} 
$delete = new deleteContact();
$delete->getValue();
$delete->delete_Contact();
include '../../footer.php';
?>