<?php
    include '../../header.php';
    class contactus extends connection
    {
      public function all_contacts()
      {
        $this->connected();
        $query = " SELECT * FROM contactus";
        /***** Executing query *****/
        $result = $this->connect->query($query);
        if($result->num_rows>0)
        {?>
        <div class="container">
          <h1 class="text-center mt-4">Requests</h1>
          <table class="table">
          <thead>
            <tr>
              <th scope="col" width="5%">id</th>
              <th scope="col" width="10%">Name</th>
              <th scope="col" width="10%">Email</th>
              <th scope="col" width="10%">Mobile</th>
              <th scope="col" width="20%">Subject</th>
              <th scope="col" width="30%">Message</th>
              <th scope="col" width="15%">Added On</th>
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
              <td><?php echo $row['subject']?></td>
              <td><?php echo $row['message']?></td>
              <td><?php echo $row['added_on']?></td>
              <td>
                <a href="deleteContact.php?ID=<?php echo $row['id']?>"><button class="btn btn-danger" name="delete">Delete</button>&nbsp
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
    $show_contact = new contactus();
    $show_contact->all_contacts();
    ?>
</div>  
<?php
  include '../../footer.php';
?>