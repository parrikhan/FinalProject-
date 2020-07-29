<?php
include '../../header.php';
class editDish extends connection
{
    private $id;
    public function edit_dish()
    {
        if(isset($_GET['dish_details_id']))
        {
            $this->connected();
            $dish_detail_id = $_GET['dish_details_id'];
            $dish__id = $_GET['ID'];
            $deleteQuery = "DELETE FROM dish_details WHERE id='$dish_detail_id' ";
            $this->connect->query($deleteQuery);
            header("location:editDish.php?ID=".$dish__id);
        }
        $this->connected();
        $query = " SELECT * FROM category where status = '1' ";

        /***** Executing query *****/
        $result = $this->connect->query($query);
        if($result->num_rows>0)
        {?>
                <div class="container mt-5">
                    <form action="update_dish.php" method="Post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Category :</label>
                        <select id ="formGroupExampleInput" class="form-control" name="selected-category">
                            <?php
                            while($row=$result->fetch_assoc())
                            {
                                echo "<option value='".$row['id']."' selected>".$row['category']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <?php
                        $this->id=$_REQUEST['ID'];
                        $dishQuery = "SELECT * FROM dish WHERE id = $this->id";
                        $dishResult = $this->connect->query($dishQuery);
                        $dishRow = $dishResult->fetch_assoc();
                    ?>
                    <div class="form-group">
                    <!-- <label for="formGroupExampleInput">ID</label> -->
                    <input type="hidden" class="form-control" id="formGroupExampleInput" name="dish-id" value="<?php echo $this->id;?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Dish</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="dish" value="<?php echo $dishRow['dish'];?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Dish Detail</label>
                        <textarea name="dish-detail" class="form-control" id="formGroupExampleInput2" cols="30" rows="5"><?php echo $dishRow['dish_detail'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Select Image</label>
                        <input type="file" name="dish-image" class="form-control" id="formGroupExampleInput2" value="<?php echo $dishRow['image'];?>"></input>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Added On</label>
                        <input type="date" class="form-control" id="formGroupExampleInput2" name="added_on" value="<?php echo $dishRow['added_on'];?>">
                    </div>
                    <div class="form-group" id="dish_box1">
						<label for="exampleInputEmail3">Dish Details</label>
                        <?php 
                            $dishDetail = "SELECT * FROM dish_details WHERE dish_id = $this->id";
                            $dishDetailResult = $this->connect->query($dishDetail);
                            $i=1;
                            while($dish_detail_row = $dishDetailResult->fetch_assoc())  
                            {
                                $dishDetailID = $dish_detail_row['id'];
                                ?>
                                <div class="row">
                                    <div class="col-5 mb-2">
                                        <input type="text" class="form-control" placeholder="Attribute" name="attribute[]" required value="<?php echo $dish_detail_row['attribute'];?>">
                                    </div>
                                    <div class="col-5 mb-2">
                                        <input type="text" class="form-control" placeholder="Price" name="price[]" required required value="<?php echo $dish_detail_row['price'];?>">
                                    </div>
                                    <?php
                                        if($i != 1)
                                        {?>
                                            <button type="button" class="btn badge-danger col-2" onclick="remove('<?php echo $dishDetailID ?>')">Remove</button>
                                        <?php
                                        }
                                    ?>
                                </div>
                                <?php
                                $i++;
                            }
                            ?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success mb-2">Edit</button>
                    <button type="button" class="btn badge-danger mr-2 mb-2" onclick="add_more()">Add More</button>
                    </form>
                </div>
                <input type="hidden" class="mb-4" id="add_more" value="1"/>
                <script>
                    function add_more(){
                        var value = jQuery('#add_more').val();
                        value++;
                        jQuery('#add_more').val(value);
                        var html = '<div class="row mt-2 mb-2" id="box'+value+'"><div class="col-5"><input type="text" class="form-control" placeholder="Attribute" name="attribute[]" required></div><div class="col-5"><input type="text" class="form-control" placeholder="Price" name="price[]" required></div><button type="button" class="btn badge-danger col-2" onclick=remove_more("'+value+'")>Remove</button></div>';
                        jQuery('#dish_box1').append(html);
                    }
                    function remove_more(id)
                    {
                        jQuery('#box'+id).remove();

                    }
                    function remove(id)
                    {
                        var confirmation = confirm("Are You Sure!!!");
                        if(confirmation ==true)
                        {
                            var cur_path=location.href;
				            location.href=cur_path+"&dish_details_id="+id;
                        }
                    }
                </script>

            <?php
        }

    }
}
$add_dish = new editDish();
$add_dish->edit_dish();
include '../../footer.php';
?>