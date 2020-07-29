<?php
include '../../header.php';
class addDish extends connection
{
    public function add_dish()
    {
        $this->connected();
        $query = " SELECT * FROM category where status = '1'";
        /***** Executing query *****/
        $result = $this->connect->query($query);
        if($result->num_rows>0)
        {
            ?>
                <div class="container mt-5">
                    <form action="insertDish.php" method="Post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Category :</label>
                        <select id ="formGroupExampleInput" class="form-control" name="selected-category" required>
                            <?php
                            while($row=$result->fetch_assoc())
                            {
                                echo "<option value='".$row['id']."' selected>".$row['category']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Dish</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="dish">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Dish Detail</label>
                        <textarea name="dish-detail" class="form-control" id="formGroupExampleInput2" cols="30" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Select Image</label>
                        <input type="file" name="dish-image" class="form-control" id="formGroupExampleInput2" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Added On</label>
                        <input type="date" class="form-control" id="formGroupExampleInput2" name="added_on" required>
                    </div>
                    <div class="form-group" id="dish_box1">
						<label for="exampleInputEmail3">Dish Details</label>
						<div class="row">
							<div class="col-5">
								<input type="text" class="form-control" placeholder="Attribute" name="attribute[]" required>
							</div>
							<div class="col-5">
								<input type="text" class="form-control" placeholder="Price" name="price[]" required>
							</div>
						</div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success mt-2">SUBMIT</button>
                    <button type="button" class="btn badge-danger mr-2 mt-2" onclick="add_more()">Add More</button>
                    </form>
                    
                </div>
                <input type="hidden" class="mb-4" id="add_more" value="1"/>
                <script>
                    function add_more(){
                        var value = jQuery('#add_more').val();
                        value++;
                        jQuery('#add_more').val(value);
                        var html = '<div class="row mt-2 mb-2" id="box'+value+'"><div class="col-5"><input type="text" class="form-control" placeholder="Attribute" name="attribute[]" required></div><div class="col-5"><input type="text" class="form-control" placeholder="Price" name="price[]" required></div><button class="btn btn-danger col-2" onclick=remove_more("'+value+'")>Remove</button></div>';
                        jQuery('#dish_box1').append(html);
                    }
                    function remove_more(id)
                    {
                        jQuery('#box'+id).remove();
                    }
                </script>
            <?php
        }

    }
}

$add_dish = new addDish();
$add_dish->add_dish();
include '../../footer.php';
?>
