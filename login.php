<?php
$page='login';
include 'header.php'?>
        <div class="container">
        <div class="row">
            <div class="col-sm-5 mx-auto border border-primary shadow mt-5">
                <h1 class="text-center mb-3">Sign In</h1>
                <p class=""><?php if(!empty($msg))echo $msg; ?></p>
                <form action="db.php" method="POST">
                    <div class="row mb-3">
                        <div class="col-sm-4 text-center">
                            <label for="text" class="form-label">Email</label>
                        </div>
                        <div class="col-sm-8 text-center">
                            <input type="text" name="e" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 text-center">
                            <label for="text" class="form-label">Password</label>
                        </div>
                        <div class="col-sm-8 text-center">
                            <input type="password" name="p" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="row text-center mb-3">
                        <div class="col mx-auto">
                            <button class="btn btn-primary" name="login">Submit</button>
                        </div>
                    </div>
                </form>
                <p>Don't have an account? <a href="index.php">Click Here to signup</a></p>
            </div>
        </div>
    </div>

</body>
</html>