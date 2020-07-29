<?php 
include '../../header.php';
include '../../constant.php';
class update_dish extends connection
{
    private $id;
    private $category;
    private $image;
    private $dish;
    private $dish_detail;
    private $Added_on;
    private $attribute;
    private $price;

    public function updateDish()
    {
        $this->connected();
        $this->id=$_POST['dish-id'];
        $this->category=$_POST['selected-category'];
        $this->image=$_FILES['dish-image']['name'];
        $this->dish=$_POST['dish'];        
        $this->dish_detail =$_POST['dish-detail'];
        $this->Added_on=$_POST['added_on'];
        $this->attribute= $_POST['attribute'];
        $this->price= $_POST['price'];

        if($this->id == " ")
        {
            $query = "SELECT * FROM dish WHERE dish = '$this->dish'";
        }
        else
        {
            $query="SELECT * FROM dish WHERE dish='$this->dish' AND id!='$this->id'";

        }        
        $getExistingDish = $this->connect->query($query);
        if($getExistingDish->num_rows>0)
        {
            echo "Dish Already exists";
        }
        else
        {
            move_uploaded_file($_FILES['dish-image']['tmp_name'],SERVER_IMAGE.$_FILES['dish-image']['name']);
            $updateCategory = "UPDATE dish SET 
                                category_id='$this->category',
                                dish='$this->dish',
                                dish_detail='$this->dish_detail',
                                image = '$this->image',
                                status = 1,
                                added_on='$this->Added_on' WHERE id='$this->id'";
                                
            $dishDetailQuery = "SELECT * FROM dish_details WHERE dish_id = '$this->id'";
            $dishDetailResult = $this->connect->query($dishDetailQuery);
            while($dish_detail_row = $dishDetailResult->fetch_assoc()) 
            {
                $dishDetailID = $dish_detail_row['id'];
                if($dishDetailID)
                {
                    foreach($this->attribute as $key=>$value)
                    {
                        $attribute=$value;
                        $price=$this->price[$key];
                        echo $dishDetailID,$attribute,$price;
                        $dishDetailUpdate= "UPDATE dish_details SET 
                                        dish_id = '$this->id',
                                        attribute = '$attribute',
                                        price = '$price',
                                        status = 1,
                                        added_on = '$this->Added_on' ";
                                        $this->connect->query($dishDetailUpdate);       
                    }     
                }
                else
                {
                    $dishDetailInsert = "INSERT INTO dish_details (dish_id,attribute,price,status,added_on) 
                                        VALUES ('$getId','$attribute','$price',1,'$this->Added_on')";
                    $this->connect->query($dishDetailInsert);
                }
                
            }                    
            if($this->connect->query($updateCategory) === TRUE)
            {
                header("location:dish.php");
            }                    
        }
    }
}
$update=new update_dish();
$update->updateDish();
include '../../footer.php';
?>