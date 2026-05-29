<?php 
$page='signup';
include 'header.php'?>
    <div class="container">
        <div class="row">
            <div class="col-sm-5 mx-auto border border-primary shadow mt-5">
                <h1 class="text-center mb-3">Signup</h1>
                <p class="text-danger"><?php if(!empty($msg))echo $msg; ?></p>
                <form action="db.php" method="POST">
                    <div class="row mb-3">
                        <div class="col-sm-4 text-center">
                            <label for="text" class="form-label">Name</label>
                        </div>
                        <div class="col-sm-8 text-center">
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 text-center">
                            <label for="text" class="form-label">Email</label>
                        </div>
                        <div class="col-sm-8 text-center">
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 text-center">
                            <label for="text" class="form-label">Mobile Number</label>
                        </div>
                        <div class="col-sm-8 text-center">
                            <input type="text" name="mobile" class="form-control" placeholder="Mobile Number">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 text-center">
                            <label for="text" class="form-label">Password</label>
                        </div>
                        <div class="col-sm-8 text-center">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="row text-center mb-3">
                        <div class="col mx-auto">
                            <button class="btn btn-primary" name="signup">Submit</button>
                        </div>
                    </div>
                </form>
                <p>Already have an account? <a href="login.php">Click Here to login</a></p>
            </div>
        </div>
    </div>
</body>
</html>