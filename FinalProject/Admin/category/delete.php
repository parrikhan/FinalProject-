<?php
include '../../header.php';
class delete extends connection
{
    private $deleteCategory;
    
    public function deleteCategory()
    {
        $this->connected();
        $deleteQuery = "DELETE FROM category WHERE id = '$this->deleteCategory'";
        if($this->connect->query($deleteQuery)===TRUE)
        {
            // echo "Record is Deleted Successfully !!!";
            header("location:category.php");
        }
        else 
        {
            echo "An error has occured !!!";
        }

    }
    public function getValue()
    {
        $this->deleteCategory = $_REQUEST['ID'];
        // echo $this->deleteCategory;
    }
} 
$deleteKey = new delete();
$deleteKey->getValue();
$deleteKey->deleteCategory();
include '../../footer.php';
?>