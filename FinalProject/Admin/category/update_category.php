<?php 
include '../../header.php';
class update_category extends connection
{
    private $id;
    private $category;
    private $Order_number;
    private $Added_on;

    public function updateCategory()
    {
        $this->connected();
        $this->id=$_POST['id'];
        $this->category=$_POST['category'];
        $this->Order_number=$_POST['order_number'];
        $this->Added_on=$_POST['added_on'];

        if($this->id == " ")
        {
            $query = "SELECT * FROM category WHERE category = '$this->category'";
        }
        else
        {
            $query="SELECT * FROM category WHERE category='$this->category' AND id!='$this->id'";

        }        
        $getExistingCategory = $this->connect->query($query);
        if($getExistingCategory->num_rows>0)
        {
            echo "Category Already exists";
        }
        else
        {
            $updateCategory = "UPDATE category SET 
                                category='$this->category',
                                order_number='$this->Order_number',
                                added_on='$this->Added_on' WHERE id='$this->id'";
            if($this->connect->query($updateCategory) === TRUE)
            {
                header("location:category.php");
            }                    
        }
    }
}
$update_category=new update_category();
$update_category->updateCategory();
include '../../footer.php';
?>