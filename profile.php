<?php 
$page = "myprofile";
if(isset($_SESSION['id']))
{
    $uid=$_SESSION['id'];
    $sql= "SELECT * FROM userdetail WHERE uid = '$uid'";
    $res= mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res);
    $uid = $row['uid'];
    $n=$row['name'];
    $m=$row['mobile'];
    $e=$row['email'];
    $img=$row['img']; 
}
else
{
    header("Location: http://localhost/crud/login.php");
}

    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');
    header('Date: Tue, 03 Apr 2018 19:03:12 GMT');
    if($_SESSION['r'] == 'admin')
    {
        include 'admin_header.php';
    }
    else
    {
        include 'user_header.php';
    }
   
?>

    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-5 mx-auto mt-2">
                <div class="row">
                    <div class="col text-center rounded">
                        <h1> Welcome to Profile</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3 mx-auto border border-primary shadow mt-5">
                <h4 class="text-center mb-3">Profile</h4>
                <p class="text-success" id="msg"><?php if(!empty($msg))echo $msg; ?></p>
                    <div class="row mb-3">
                        <div class="col-sm-4 text-center">
                            <p>NAME: </p>
                        </div>
                        <div class="col-sm-8 text-center">
                        <p id="name"><?php echo $n; ?></p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 text-center">
                            <p>Email: </p>
                        </div>
                        <div class="col-sm-8 text-center">
                            <p id="email"><?php echo $e; ?></p>
                        </div>
                    </div>
                    <div class="row text-center mb-3">
                        <div class="col mx-auto">
                            <p>Mobile: </p>
                        </div>
                        <div class="col-sm-8 text-center">
                            <p id="mobile"><?php echo $m; ?></p>
                        </div>
                    </div>
                <a class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Edit</a>
                <a href="db.php?delete" class="btn btn-danger m-2">Delete</a>
                <a href="db.php?logout" class="btn btn-info m-2">Logout</a>
            </div>  
            <div class="col-3 mx-auto border border-primary shadow mt-5">
                <h4 class="text-center mb-3">Profile Picture</h4>
                <p class="text-success" id="delay"><?php if(!empty($m_profile))echo $m_profile; ?></p>
                    <div class="row mb-3">
                        <div class="col text-center mx-auto">
                            <img src="<?php if(!empty($img)){ echo $img; } else{ echo"img/default.png";} ?>" alt="user_image" width="150px" style="border-radius: 50%;">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col text-center mx-auto">
                            <form action="db.php?profilepic" method="POST" enctype="multipart/form-data">
                                <input type="file" name="photo" class="mb-3 m-3">
                                <input type="submit"  value="Update" class="btn btn-warning">
                            </form>
                        </div>
                    </div>
            </div> 
            <div class="col-3 mx-auto border border-primary shadow mt-5">
                <h4 class="text-center mb-3">Password Update</h4>
                <p class="text-success" id="pass_msg"></p>

                    <div class="row mb-3">
                        <div class="col-sm-4 text-center">
                            <label for="text" class="form-label">Old Password</label>
                        </div>
                        <div class="col-sm-8 text-center">
                            <input type="password" id="o_password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 text-center">
                            <label for="text" class="form-label">New Password</label>
                        </div>
                        <div class="col-sm-8 text-center">
                            <input type="password" id="n_password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 text-center">
                            <label for="text" class="form-label">Confirm Password</label>
                        </div>
                        <div class="col-sm-8 text-center">
                            <input type="password" id="c_password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="row text-center mb-3">
                        <div class="col mx-auto">
                            <button class="btn btn-primary" id="change_password">Change Password</button>
                        </div>
                    </div>
                
            </div>              
        </div>                     
    </div>      
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> -->
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
                    <input type="text" name="n" class="form-control" id="na" value="<?php echo $n; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4 text-center">
                    <label for="text" class="form-label">Email</label>
                </div>
                <div class="col-sm-8 text-center">
                    <input type="text" name="e" class="form-control" id="em" value="<?php echo $e; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4 text-center">
                    <label for="text" class="form-label">Mobile Number</label>
                </div>
                <div class="col-sm-8 text-center">
                    <input type="text" name="m" class="form-control" id="mo" value="<?php echo $m; ?>">
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="uid" value="<?php echo $uid; ?>">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
        <button name="edit" class="btn btn-primary">Edit</button>
    </div>

    </div>
    </form>
  </div>
</div>  
<!-- Modal ends -->


<script>
    $("#change_password").click(function() {
            let id = <?php echo $uid ?>;
            let n = $('#n_password').val();
            let o = $('#o_password').val();
            let c = $('#c_password').val();
            console.log(c);
            $.ajax({
                url:"db.php",
                type:'POST',
                data:{uid:id,n:n,o:o,c:c,type:'change_password'},
                success: function(data)
                {
                    $("#pass_msg").text(data);
                    $('#n_password').val('');
                    $('#o_password').val('');
                    $('#c_password').val('');
                    
                }
            })
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