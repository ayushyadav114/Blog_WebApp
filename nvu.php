<?php 
include 'admin_header.php'; 
  $sql= "SELECT * FROM userdetail where role = 'user' && is_verified = '0' && is_deleted = '1'";
  $res= mysqli_query($conn,$sql);
        

?>
<div class="container">
        <div class="row mt-3">
            <div class="col-sm-5 mx-auto mt-2">
                <div class="row">
                    <div class="col text-center">
                        <h3> Non verified users</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <table id="xyz" class="table table-responsive">
  <thead>
    <tr>
      <th scope="col"><input type="checkbox"></th>
      <th scope="col">Uid</th>
      <th scope="col">Photo</th>
      <th scope="col">Name</th>
      <th scope="col">Mobile</th>
      <th scope="col">Email</th>
      <th scope="col">Signup date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
  <?php 
  foreach($res as $row)
  {
    ?>

  
  
    <tr>
      <td><input type="checkbox"></td>
      <td><?php echo $row['uid'];?></td>
      <td><img src="<?php if($row['img']){echo $row['img'];} else{echo "img/default.png";}?>" height="50" width="50"></td>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['mobile'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['signupdate'];?></td>
      
      <td>
        <a href="db.php?verify=<?php echo $row['uid']; ?>" class="btn btn-success"> Verify</a>
        
        <a href="db.php?Nvudelete=<?php echo $row['uid']; ?>" class="btn btn-danger"> Delete</a>
        
      </td>
    </tr>
  
  <?php } ?>
  </tbody>
</table>             
        </div>                     
    </div>
            
</div>
  <link href="css/datatables.min.css" rel="stylesheet">
    <script src="css/datatables.min.js" ></script>
    <script>
       $(document).ready( function () {
    $('#xyz').DataTable();
    });
</script>
<script>
  window.addEventListener('pageshow', function (event) {
    if (event.persisted || performance.getEntriesByType("navigation")[0].type === "back_forward") {
      location.reload();
    }
  });
</script>
</body>
</html>