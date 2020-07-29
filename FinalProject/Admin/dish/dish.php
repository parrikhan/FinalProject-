<?php
include '../../header.php';
class dish extends connection{
    public function all_dishes()
    {
        $this->connected();
        $query = " SELECT dish.*,category.category FROM dish,category WHERE dish.category_id=category.id";
        /***** Executing query *****/
        $result = $this->connect->query($query);
        if($result->num_rows>0)
        {?>
        <a href="addDish.php"><h3>Add-Dish</h3></a>
        <div class="container">
          <table class="table">
          <thead>
            <tr>
              <th scope="col" width="5%">id</th>
              <th scope="col" width="15%">Category</th>
              <th scope="col" width="10%">Dish</th>
              <th scope="col" width="10%">Dish Detail</th>
              <th scope="col" width="15%">Image</th>
              <th scope="col" width="5%">Status</th>
              <th scope="col" width="15%">Added On</th>
              <th scope="col" width="25%">Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php
          while($row =$result->fetch_assoc())
          {?>
          
            <tr>
              <td><?php echo $row['id']?></td>
              <td><?php echo $row['category']?></td>
              <td><?php echo $row['dish']?></td>
              <td><?php echo $row['dish_detail']?></td>
              <td><a target="_blank" href="<?php echo SITE_IMAGE.$row['image']?>"><img src="<?php echo SITE_IMAGE.$row['image']?>"></a></td>
              <td><?php echo $row['status']?></td>
              <td><?php echo $row['added_on']?></td>
              <td> 
              <a href="editDish.php?ID=<?php echo $row['id']?>"><button id="edit-dish" class = "btn btn-success" name="edit">Edit</button>&nbsp
                <?php
                  if($row['status'] == 1)
                  {?>
                    <a href="dish_status.php?Status=<?php echo $row['status']?>&ID=<?php echo $row['id']?>"><button class = "btn btn-info" name="edit">Active</button>&nbsp
                  <?php
                  } 
                  else
                  {?>
                  <a href="dish_status.php?Status=<?php echo $row['status']?>&ID=<?php echo $row['id']?>"><button class = "btn btn-warning" name="edit">Deactive</button>&nbsp
                  <?php
                  }
                  ?>
                </td>
            </tr>
          <?php
          }?>
         
         </tbody>
        </table>  
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
$dish = new dish();
$dish->all_dishes();
include '../../footer.php';
?>