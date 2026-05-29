<?php 
include 'admin_header.php'; 
  $sql= "SELECT * FROM blog where is_verified = '1' && is_deleted = '0'";
  $res= mysqli_query($conn,$sql);
        

?>
<div class="container">
        <div class="row mt-3">
            <div class="col-sm-5 mx-auto mt-2">
                <div class="row">
                    <div class="col text-center">
                        <h3> Verified Blogs</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <table class="table table-responsive">
  <thead>
    <tr>
      <th scope="col"><input type="checkbox"></th>
      <th scope="col">Bid</th>
      <th scope="col">Blog Header</th>
      <th scope="col">Blog Category</th>
      <th scope="col">Blog Description</th>
      <th scope="col">Blog Photo</th>
      <th scope="col">Post Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php 
  foreach($res as $row)
  {
    ?>

  
  <tbody class="table-group-divider">
    <tr>
      <td><input type="checkbox"></td>
      <td><?php echo $row['bid'];?></td>
      <td><?php echo $row['bh'];?></td>
      <td><?php echo $row['bc'];?></td>
      <td><?php echo $row['bd'];?></td>
      <td><img src="<?php echo $row['bi'];?>" alt="" width="50px"></td>
      <td><?php echo $row['pdate'];?></td>
      <td>
        <a href="db.php?Vbsuspend=<?php echo $row['bid']; ?>" class="btn btn-success"> Suspend</a>
        <a href="db.php?bedit=<?php echo $row['bid']; ?>" class="btn btn-warning"> Edit</a>
        <a href="db.php?Vbdelete=<?php echo $row['bid']; ?>" class="btn btn-danger"> Delete</a>
        
      </td>
    </tr>
  </tbody>
  <?php } ?>
</table>             
        </div>                     
    </div>
            
</div>
<script>
  window.addEventListener('pageshow', function (event) {
    if (event.persisted || performance.getEntriesByType("navigation")[0].type === "back_forward") {
      location.reload();
    }
  });
</script>
</body>
</html>