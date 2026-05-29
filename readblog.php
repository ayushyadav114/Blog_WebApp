<?php include 'header.php'; ?>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="row w-100">
        <div class="col-12 d-flex justify-content-center">
            <div class="card mb-3" style="width: 50rem;">
                <img src="<?php echo $row['bi']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="text-center">Blog - <?php echo $row['bh']?></h5>
                    <h6 class="text-end">Category - <?php echo $row['bc']; ?></h6>
                    <p class="card-text"><?php echo $row['bd']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>