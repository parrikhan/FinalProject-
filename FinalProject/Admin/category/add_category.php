<?php 
include '../../header.php';
class add_category extends connection
{
    private $category;
    private $Order_number;
    private $Added_on;

    public function add()
    {
        $this->connected();
        $this->category=$_POST['category'];
        $this->Order_number=$_POST['order_number'];
        $this->Added_on=$_POST['added_on'];
        $SearchCategory="SELECT * FROM category WHERE category='$this->category'";
        $getExistingCategory = $this->connect->query($SearchCategory);
        if($getExistingCategory->num_rows>0)
        {?>
            <h1>This Category allready exist !!!</h1>
        <?php
        }
        else
        {
            $insertCategory = "INSERT INTO category(category,order_number,status,added_on)
            VALUES('$this->category','$this->Order_number',1,'$this->Added_on')";
            if($this->connect->query($insertCategory)=== TRUE)
            {
                header("location:category.php");
            }
        }
    }
}
$save_category=new add_Category();
$save_category->add();
include '../../footer.php';
?>