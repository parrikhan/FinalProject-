<?php 
include '../../header.php';
include '../../constant.php';

class insertDish extends connection
{
    private $id;
    private $category;
    private $dish;
    private $dishDetail;
    private $Added_on;
    private $image;
    private $attribute;
    private $price;

    public function addDish()
    {
        $this->connected();
        $this->category=$_POST['selected-category'];
        $this->dish=$_POST['dish'];
        $this->Added_on=$_POST['added_on'];
        $this->dishDetail=$_POST['dish-detail'];
        $this->image=$_FILES['dish-image']['name'];
        $this->attribute=$_POST['attribute'];
        $this->price=$_POST['price'];

        move_uploaded_file($_FILES['dish-image']['tmp_name'],SERVER_IMAGE.$_FILES['dish-image']['name']);
        $SearchDish="SELECT * FROM dish WHERE dish='$this->dish'";
        $getExistingDish = $this->connect->query($SearchDish);
        if($getExistingDish->num_rows>0)
        {?>
            <h1>This Dish allready exists !!!</h1>
        <?php
        }
        else
        {
            $insertDish = "INSERT INTO dish(category_id,dish,dish_detail,image,status,added_on)
            VALUES('$this->category','$this->dish','$this->dishDetail','$this->image',1,'$this->Added_on')";
            $this->connect->query($insertDish);
            $getId=$this->connect->insert_id;
            foreach($this->attribute as $key=>$value)
            {
                $attribute=$value;
                $price=$this->price[$key];
                $dishDetail= "INSERT INTO dish_details(dish_id,attribute,price,status,added_on)
                VALUES('$getId','$attribute','$price',1,'$this->Added_on')";
                $this->connect->query($dishDetail);
            }
            header("location:dish.php");
        }
    }
}
$save_dish=new insertDish();
$save_dish->addDish();
include '../../footer.php';
?>
