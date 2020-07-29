<?php
    include '../../header.php';
    class category extends connection
    {
      public function all_categories()
      {
        $this->connected();
        $query = " SELECT * FROM category";
        /***** Executing query *****/
        $result = $this->connect->query($query);
        if($result->num_rows>0)
        {?>
        <div class="container">
          <h1 class="text-center mt-4">All Categories</h1>
          <table class="table">
          <thead>
            <tr>
              <th scope="col" width="10%">id</th>
              <th scope="col" width="15%">Category</th>
              <th scope="col" width="10%">Order Number</th>
              <th scope="col" width="10%">Status</th>
              <th scope="col" width="20%">Added On</th>
              <th scope="col" width="40%">Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php
          while($row =$result->fetch_assoc())
          {?>
          
            <tr>
              <td><?php echo $row['id']?></td>
              <td><?php echo $row['category']?></td>
              <td><?php echo $row['order_number']?></td>
              <td><?php echo $row['status']?></td>
              <td><?php echo $row['added_on']?></td>
              <td>
                <a href="edit.php?ID=<?php echo $row['id']?>"><button id="edit-category" class = "btn btn-success" name="edit">Edit</button>&nbsp
                <?php
                  if($row['status'] == 1)
                  {?>
                    <a href="setting_status.php?Status=<?php echo $row['status']?>&ID=<?php echo $row['id']?>"><button class = "btn btn-info" name="edit">Active</button>&nbsp
                  <?php
                  } 
                  else
                  {?>
                  <a href="setting_status.php?Status=<?php echo $row['status']?>&ID=<?php echo $row['id']?>"><button class = "btn btn-warning" name="edit">Deactive</button>&nbsp
                  <?php
                  }
                  ?>
                  <a href="delete.php?ID=<?php echo $row['id']?>"><button id="delete-category" class="btn btn-danger" name="delete">Delete</button>&nbsp
              </td>
            </tr>
          <?php
          }?>
         
         </tbody>
        
        </table>  
        <a href="add.php">Add-category</a>
        <?php
        }
        else
        {?>
        <tr>
          <td colspan="5">No data found</td>
        </tr>
        <?php
        }
      }
    }
    $show_category = new category();
    $show_category->all_categories();
?>   
</div>  
<?php
  include '../../footer.php';
?>