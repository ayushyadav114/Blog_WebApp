<?php 
if(isset($_SESSION['id']))
{
    $bid=$_SESSION['bid'];
    $sql= "SELECT * FROM blog WHERE bid = '$bid'";
    $res= mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res);
    $h=$row['bh'];
    $c=$row['bc'];
    $i=$row['bi'];
    $d=$row['bd']; 
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
            <div class="col-sm-7 mx-auto border border-primary shadow mt-5">
                <h1 class="text-center mb-2">Edit Blog</h1>
                <p class="text-danger"><?php if(!empty($msg))echo $msg; ?></p>
                <form action="db.php" method="POST" enctype="multipart/form-data">
                    <div class="row mb-1">
                        <div class="col-sm-4 text-center">
                            <label for="text" class="form-label"> Blog Heading</label>
                        </div>
                        <div class="col-sm-8 text-center">
                            <input type="text" name="bh" class="form-control" placeholder="Blog Heading" value='<?php echo $h ?>'>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-sm-4 text-center">
                            <label for="text" class="form-label">Blog Category</label>
                        </div>
                        <div class="col-sm-8 text-center">
                            <input type="text" name="bc" class="form-control" placeholder="Blog Category" value='<?php echo $c ?>'>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-sm-4 text-center">
                            <label for="text" class="form-label">Blog Photo</label>
                        </div>
                        <div class="col-sm-8 text-center">
                            <img src="<?php echo $i ?>" alt="" width="80px" class="m-1 rounded">
                            <input type="file" name="bp" class="form-control" value='<?php echo $i ?>'>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-sm-4 text-center">
                            <label for="text" class="form-label">Blog Description</label>
                        </div>
                        <div class="col-sm-8 text-center">
                            <textarea name="bd" id="" rows="6" cols="50"><?php echo $d ?></textarea>
                        </div>
                    </div>
                    <div class="row text-center mb-1">
                        <div class="col mx-auto">
                            <button class="btn btn-primary" name="edit_post">Edit Blog</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>