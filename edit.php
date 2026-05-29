<?php
if(isset($_SESSION['id']))
{
    $uid = $_SESSION['id'];
    $sql= "SELECT * FROM userdetail WHERE uid = '$uid'";
    $res= mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res);
    $n=$row['name'];
    $e=$row['email'];
    $m=$row['mobile'];
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
        <div class="row">
            <div class="col-sm-5 mx-auto border border-primary shadow mt-5">
                <h1 class="text-center mb-3">Edit Profile</h1>
                <p class="text-danger"><?php if(!empty($msg))echo $msg; ?></p>
                <form action="db.php?update" method="POST">
                    <div class="row mb-3">
                        <div class="col-sm-4 text-center">
                            <label for="text" class="form-label">Name</label>
                        </div>
                        <div class="col-sm-8 text-center">
                            <input type="text" name="name" class="form-control" value="<?php echo $n;?>">
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-4 text-center">
                            <label for="text" class="form-label">Mobile Number</label>
                        </div>
                        <div class="col-sm-8 text-center">
                            <input type="text" name="mobile" class="form-control" value="<?php echo $m;?>">
                        </div>
                    </div>
                    
                    <div class="row text-center mb-3">
                        <div class="col mx-auto">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>