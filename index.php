<?php 

    include 'config.php';
    $sql = "select * from blog where is_deleted='0'";
    $res= mysqli_query($conn,$sql);
    include 'header.php';
    
    
    
?>
    <div class="container">
        <div class="row text-center mb-2">
            <h3 class="mb-3">All Blogs</h3>
        </div>
        <div class="row mx-auto">
            <?php 
                foreach($res as $row) 
                {
            ?>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xl-4 mb-3 text-center mx-auto">
                
                <div class="card" style="width: 18rem;">
                <img src="<?php echo $row['bi']; ?>" class="card-img-top" alt="..." height='200px' >
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['bh']; ?></h5>
                    <p class="card-text"><?php echo substr($row['bd'],0,100)."..."; ?></p>
                    <a href="db.php?read=<?php echo $row['bid']; ?>" class="btn btn-primary">Read more</a>
                </div>
                </div>
                
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>