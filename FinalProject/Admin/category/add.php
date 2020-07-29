<?php
    include '../../header.php';
?>
 <div class="container mt-5">
    <form action="add_category.php" method="Post">
        <div class="form-group">
            <label for="formGroupExampleInput">Category</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="category" required>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Order Number</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="order_number" required>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Added On</label>
            <input type="date" class="form-control" id="formGroupExampleInput2" name="added_on" required>
        </div>
        <button type="submit" name="submit" class="btn btn-success">SAVE</button>
    </form>
 </div>
<?php
    include '../../footer.php';
?>