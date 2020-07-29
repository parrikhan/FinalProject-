<?php
    include '../../header.php';
    class user extends connection
    {
      public function all_categories()
      {
        $this->connected();
        $query = " SELECT * FROM user";
        /***** Executing query *****/
        $result = $this->connect->query($query);
        if($result->num_rows>0)
        {?>
        <div class="container">
          <table class="table">
          <h1 class="text-center mt-4">All Users</h1>
          <thead>
            <tr>
              <th scope="col" width="10%">id</th>
              <th scope="col" width="15%">Name</th>
              <th scope="col" width="10%">Email</th>
              <th scope="col" width="15%">Mobile</th>
              <th scope="col" width="20%">Password</th>
              <th scope="col" width="5%">Status</th>
              <th scope="col" width="15%">Added On</th>
              <th scope="col" width="10%">Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php
          while($row =$result->fetch_assoc())
          {?>
          
            <tr>
              <td><?php echo $row['id']?></td>
              <td><?php echo $row['name']?></td>
              <td><?php echo $row['email']?></td>
              <td><?php echo $row['mobile']?></td>
              <td><?php echo $row['password']?></td>
              <td><?php echo $row['Status']?></td>
              <td><?php echo $row['added_on']?></td>
              <td>
                <?php
                  if($row['Status'] == 1)
                  {?>
                    <a href="user_status.php?Status=<?php echo $row['Status']?>&ID=<?php echo $row['id']?>"><button class = "btn btn-info" >Active</button>&nbsp
                  <?php
                  } 
                  else
                  {?>
                  <a href="user_status.php?Status=<?php echo $row['Status']?>&ID=<?php echo $row['id']?>"><button class = "btn btn-warning">Deactive</button>&nbsp
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
    $show_user = new user();
    $show_user->all_categories();
?>

    
</div>  
<?php
  include '../../footer.php';
?>