<?php include 'user_header.php'?>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto border border-primary shadow mt-5">
                <h1 class="text-center mb-3">Post Blog</h1>
                <p class="text-success"><?php if(!empty($msg))echo $msg; ?></p>
                <form action="db.php" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col-sm-4 text-center">
                            <label for="text" class="form-label"> Blog Heading</label>
                        </div>
                        <div class="col-sm-8 text-center">
                            <input type="text" name="bh" class="form-control" placeholder="Blog Heading">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 text-center">
                            <label for="text" class="form-label">Blog Category</label>
                        </div>
                        <div class="col-sm-8 text-center">
                            <input type="text" name="bc" class="form-control" placeholder="Blog Category">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 text-center">
                            <label for="text" class="form-label">Blog Photo</label>
                        </div>
                        <div class="col-sm-8 text-center">
                            <input type="file" name="bp" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 text-center">
                            <label for="text" class="form-label">Blog Description</label>
                        </div>
                        <div class="col-sm-8 text-center">
                            <textarea name="bd" id="" rows="6" cols="50"></textarea>
                        </div>
                    </div>
                    <div class="row text-center mb-3">
                        <div class="col mx-auto">
                            <button class="btn btn-primary" name="post">Post Blog</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>