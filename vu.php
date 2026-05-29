<?php 
include 'admin_header.php'; 
  $sql= "SELECT * FROM userdetail where role = 'user' && is_verified = '1' && is_deleted = '1'";
  $res= mysqli_query($conn,$sql);
?>
<div class="container">
         <div class="row mt-3">
            <div class="col-sm-5 mx-auto mt-2">
                <div class="row">
                    <div class="col text-center">
                        <h3> Verified users</h3>
                    </div>
                </div>
            </div>
         <p class="text-success" id="msg"><?php if(!empty($msg))echo $msg; ?></p>
        </div>
      <div class="row">
              <table id="xyz" class="table table-responsive" >
                  <thead>
                    <tr>
                      <th><input type="checkbox"></th>
                      <th>Uid</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Signup date</th>
                      <th>Action</th>
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
                        <a class="btn btn-primary" onclick="edituser(<?php echo $row['uid']; ?>)"> Edit</a>
                        <a href="db.php?Vudelete=<?php echo $row['uid']; ?>" class="btn btn-danger"> Delete</a>
                        <a href="db.php?suspend=<?php echo $row['uid']; ?>" class="btn btn-info"> Suspend</a>
                      </td>
                    </tr>
                  
                  <?php } ?>
                  </tbody>
              </table>             
      </div>                        
</div>

<!-- Modal Start -->
<div class="modal fade" id="staticBack" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="db.php" method="POST">
     <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Info</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="row mb-3">
                <div class="col-sm-4 text-center">
                    <label for="text" class="form-label">Name</label>
                </div>
                <div class="col-sm-8 text-center">
                    <input type="text" name="n" class="form-control" id="na">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4 text-center">
                    <label for="text" class="form-label">Email</label>
                </div>
                <div class="col-sm-8 text-center">
                    <input type="text" name="e" class="form-control" id="em">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4 text-center">
                    <label for="text" class="form-label">Mobile Number</label>
                </div>
                <div class="col-sm-8 text-center">
                    <input type="text" name="m" class="form-control" id="mo">
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="uid" id="uid_edit">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
        <button name="edit_admin" class="btn btn-primary">Edit</button>
    </div>

    </div>
    </form>
  </div>
</div>  
<!-- Modal ends -->

  <link href="css/datatables.min.css" rel="stylesheet">
  <script src="css/datatables.min.js" ></script>
  <script>
    $(document).ready( function () {
    $('#xyz').DataTable();
    });
    function edituser(x)
    {
      $.ajax({
            url: "db.php",
            type: 'POST',
            data: { uid: x, type: 'editshow' },
            dataType: 'json',
            success: function(data) {
                let id = data.uid;
                $('#uid_edit').val(id);
                $('#na').val(data.name);
                $('#em').val(data.email);
                $('#mo').val(data.mobile);
                $('#staticBack').modal('show');
            }
        });
        }
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