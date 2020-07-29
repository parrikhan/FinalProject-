<?php
include '../../header.php';
class edit extends connection
{
    private $id;
    public function addCategory()
    {
        $this->connected();
        $this->id=$_REQUEST['ID'];
        $query="SELECT * FROM category WHERE id='$this->id'";
        $result=$this->connect->query($query);
        if($result->num_rows>0)
        {
            $row=$result->fetch_assoc();
            ?>
            <div class="container">
                <form action = "update_category.php" method="Post">
                    <div class="form-group">
                        <label for="formGroupExampleInput">ID</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="id" value="<?php echo $row['id']?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Category</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="category" value="<?php echo $row['category']?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Order Number</label>
                        <input type="int" class="form-control" id="formGroupExampleInput2" name="order_number" value="<?php echo $row['order_number']?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Added On</label>
                        <input type="date" class="form-control" id="formGroupExampleInput2" name="added_on" value="<?php echo $row['added_on']?>">
                    </div>
                    <button type="submit" class="btn btn-success">UPDATE</button>
                </form>
            </div>    
            <?php
            }
    }
}

$category = new edit();
$category->addCategory();
include '../../footer.php';
?>