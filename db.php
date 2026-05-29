<?php
$_SESSION['conn'] = $conn = mysqli_connect('localhost','root','','infochord_intern');
session_start();
if(isset($_POST['signup']))
{
    $name= $_POST['name'];
    $email= $_POST['email'];
    $mobile= $_POST['mobile'];
    $password= $_POST['password'];
    if(!empty($name)&&!empty($email)&&!empty($mobile)&&!empty($password))
    {
        $sqlcheck_email = "select * from userdetail where email = '$email'";
        $check_email= mysqli_query($conn, $sqlcheck_email);
        $row_email = mysqli_num_rows($check_email);
        
        $sqlcheck_mobile = "select * from userdetail where mobile = '$mobile'";
        $check_mobile= mysqli_query($conn, $sqlcheck_mobile);
        $row_mobile = mysqli_num_rows($check_mobile);
        
        if($row_email>0 || $row_mobile>0)
        {
            $msg="This email or mobile is already existing";
            require 'signup.php';
        }
        else
        {
            $sql = "insert into userdetail (name, email, mobile, password) values('$name','$email','$mobile','$password')";
            $res= mysqli_query($conn, $sql);
            $msg = "Successfully Registered, You can log in here!";
            require 'login.php';
        }
        
    }
    else
    {
        $msg= "NULL values not Allowed";
        require 'signup.php';
    }
}
elseif(isset($_POST['login']))
{
    $Email = $_POST['e'];
    $Password = $_POST['p'];
    if(!empty($Email) && !empty($Password))
    {
        $sqlcheck_email = "select * from userdetail where email = '$Email'";
        $check_email= mysqli_query($conn, $sqlcheck_email);
        $row_email = mysqli_num_rows($check_email);
        if($row_email>0)
        {
            $sql="select * from userdetail where email = '$Email' and password = '$Password'";
            $res=mysqli_query($conn, $sql);
            $row= mysqli_fetch_array($res);
            
            if(!empty($row['uid']))
            {   $v = $row['is_verified'];
                $d = $row['is_deleted'];
                if($d == 1)
                {
                  if($v == 1)
                  {   $_SESSION['id'] = $row['uid'];
                      $_SESSION['r'] = $row['role'];
                      require 'profile.php';
                  }
                  else
                  {
                      $msg = "your account is not verified wait for verification";
                      require 'login.php';
                  }
                }
                else
                {
                    $msg = "your account has been deleted please signup again";
                    require 'index.php';
                }
                
                
            }
            else
            {
                $msg = "Cannot Log In as password is wrong!";
                require 'login.php';
            } 
        }
        else
        {
            $msg = "Cannot Log In as email is wrong!";
            require 'login.php';
        }
        
    }
    else
    {
        $msg= "NULL values not Allowed";
        require 'login.php';
    }
}

elseif(isset($_POST['edit']))
{
    
 if(isset($_SESSION['id']))
  {
      $uid = $_POST['uid'];
      $n = $_POST['n'];
      $e = $_POST['e'];
      $m = $_POST['m'];
    if(!empty($n) &&!empty($e) && !empty($m))
      {
        $sql = "select * from userdetail where (uid!='$uid') && (email='$e' or mobile='$m')";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($res);
        if($row > 0)
        {
          $msg = "User Email or Mobile already exists";
          require 'profile.php';
        }
        else
        {
          $sql = "update userdetail set name='$n', email = '$e', mobile = '$m' where uid = '$uid'";
          $res = mysqli_query($conn, $sql);
          $msg = "Profile Updated";
          require 'profile.php';
        }
      }
      else
      {
        $msg = "Fill all credentials !!";
        require 'profile.php';
      }
  } 
  else
  {
    header("Location:http://localhost/crud_a/login.php");
    exit();
  } 
}


// Profile pic update start here

elseif(isset($_GET['profilepic']))
{
  if(isset($_SESSION['id']))
    {
        $uid= $_SESSION['id'];
        $path= $_FILES['photo']['name'];
        $t="img/".basename($path);
        if(!empty($path))
        {
        $ext=strtolower(pathinfo($t,PATHINFO_EXTENSION));
        if($ext == "jpeg" || $ext == "jpg" || $ext == "png")
        {
            $size= $_FILES['photo']['size'];
            if($size < 1024*2*1024)
            {
              $sql = "update userdetail set img='$t' where uid = '$uid'";
              $res = mysqli_query($conn,$sql);
              move_uploaded_file($_FILES['photo']['tmp_name'],$t);
              $m_profile = "Profile Photo has been updated";
              require 'profile.php'; 
            }
            else
            {
              $m_profile = "File size is too big to upload.";
              require 'profile.php'; 
            }
        }
        else
        {
            $m_profile = "Extension doesnot match.";
            require 'profile.php';
        }   
    }
    else
    {
      $m_profile = "No file choosed ";
      require 'profile.php';
    }
  }
    else
    {
        header("Location: http://localhost/crud_a/login.php");
        exit();
    }
  
}
// Profile pic end here 

// Password change
elseif(isset($_POST['type']) && $_POST['type'] == 'change_password')
{
  if(isset($_SESSION['id']))
  {
    $uid= $_POST['uid'];
    $old_password = $_POST['o'];
    $new_password = $_POST['n'];
    $confirm_password = $_POST['c'];

    $sql = "select password from userdetail where uid = '$uid'";
    $res = mysqli_query($conn,$sql);
    $row_password = mysqli_fetch_array($res);
    $password = $row_password['password'];

    if(!empty($old_password) && !empty($new_password) && !empty($confirm_password))
    {
        if($old_password == $password)
        {
            if($new_password == $confirm_password)
            {
                if($new_password == $old_password)
                {
                    $change_msg = "Old password and new password are same";
                    echo $change_msg;
                }
                else
                {
                    $sql = "update userdetail set password = '$new_password' where uid = '$uid'";
                    $res = mysqli_query($conn,$sql);
                    $change_msg = "Password changed successfully";
                    echo $change_msg;
                }
                
            }
            else
            {
                $change_msg = "New password not equal to confirm password.";
                echo $change_msg;
            }
        }
        else{
            $change_msg = "Old password is not Correct";
            echo $change_msg;
        }
    }
    else
    {
        $change_msg = "All the fields are mandatory";
        echo $change_msg;
    } 
  }
  else
  {
     header("Location: http://localhost/crud_a/login.php");
     exit();
  }
}
// Password change ends

elseif(isset($_GET['delete']))
{
    if(isset($_SESSION['id']))
  {
    $uid= $_SESSION['id'];
    $sql = "delete from userdetail where uid = '$uid'";
    $res = mysqli_query($conn,$sql);
    $msg = "Deleted account";
    require 'index.php';

  }
  else
  {
    header("Location: http://localhost/crud_a/login.php");
    exit();
  }
    
}
elseif(isset($_GET['logout']))
{
    $_SESSION=array();
    session_unset();
    session_destroy();
    if(ini_get("session.use_cookies"))
    {
        setcookie(session_name(), '',time()-42000,'/');
    }
    header("Location:login.php");
    exit();
}
elseif(isset($_GET['vu']))
{
  if(isset($_SESSION['id']))
  {
    require 'vu.php';
  }
  else
  {
      header("Location:login.php");
    exit();
  }
    
}
elseif(isset($_GET['nvu']))
{
    if(isset($_SESSION['id']))
  {
     require 'nvu.php';
  }
  else
  {
      header("Location:login.php");
    exit();
  }
   
}
elseif(isset($_GET['profile']))
{
    if(isset($_SESSION['id']))
  {
    require 'profile.php';
  }
  else
  {
      header("Location:login.php");
    exit();
  }
    
}
elseif(isset($_GET['verify']))
{
    if(isset($_SESSION['id']))
  {
    $uid = $_GET['verify'];
    $sql = "update userdetail set is_verified = '1' where uid = '$uid'";
    $res = mysqli_query($conn,$sql);
    require 'nvu.php';
  }
  else
  {
      header("Location:login.php");
    exit();
  }
    
}
elseif(isset($_GET['suspend']))
{
    if(isset($_SESSION['id']))
  {
    $uid = $_GET['suspend'];
    $sql = "update userdetail set is_verified = '0' where uid = '$uid'";
    $res = mysqli_query($conn,$sql);
    require 'vu.php';
  }
  else
  {
      header("Location:login.php");
    exit();
  }
    
}
elseif(isset($_GET['Nvudelete']))
{
    if(isset($_SESSION['id']))
  {
    $uid = $_GET['Nvudelete'];
    $sql = "update userdetail set is_deleted = '0' where uid = '$uid'";
    $res = mysqli_query($conn,$sql);
    require 'nvu.php';
  }
  else
  {
      header("Location:login.php");
    exit();
  }
    
}
elseif(isset($_GET['Vudelete']))
{
    if(isset($_SESSION['id']))
  {
    $uid = $_GET['Vudelete'];
    $sql = "update userdetail set is_deleted = '0' where uid = '$uid'";
    $res = mysqli_query($conn,$sql);
    require 'vu.php';
  }
  else
  {
      header("Location:login.php");
    exit();
  }
    
}
elseif(isset($_GET['pb']))
{
    if(isset($_SESSION['id']))
  {
     require 'postblog.php';
  }
  else
  {
      header("Location:login.php");
    exit();
  }
   
}
elseif(isset($_POST['post']))
{
    if(isset($_SESSION['id']))
  {
    $uid = $_SESSION['id'];
    $h = $_POST['bh'];
    $c = $_POST['bc'];
    $d = $_POST['bd']; 
    $path= $_FILES['bp']['name'];
    
    if(!empty($c)&&!empty($h)&&!empty($d)&&!empty($path))
    {
        $t="img/".basename($path);
        $ext= strtolower(pathinfo($t,PATHINFO_EXTENSION));
        if($ext == "jpeg" || $ext == "jpg" || $ext == "png")
        {
            $sql = "insert into blog (bh,bc,bd,bi,uid) values ('$h','$c','$d','$t','$uid')";
            $res = mysqli_query($conn,$sql);
            move_uploaded_file($_FILES['bp']['tmp_name'],$t);
            
            $msg = "Blog posted";
            require 'postblog.php';
        }
        else
        {
            $msg = "Selected file must be image";
            require 'postblog.php';
        }
    }
    else
    {
        $msg = "All fields are Mandatory";
        require 'postblog.php';
    }
  }
  else
  {
      header("Location:login.php");
    exit();
  }
    
}
elseif(isset($_GET['index'])){
    require 'index.php';
}
elseif(isset($_GET['myblogs']))
{
    if(isset($_SESSION['id']))
  {
    require 'myblogs.php';
  }
  else
  {
      header("Location:login.php");
    exit();
  }
    
}
elseif(isset($_GET['vb']))
{ 
    if(isset($_SESSION['id']))
  {
    require 'vb.php';
  }
  else
  {
      header("Location:login.php");
    exit();
  }
    
}
elseif(isset($_GET['nvb']))
{
    if(isset($_SESSION['id']))
  {
     require 'nvb.php';
  }
  else
  {
      header("Location:login.php");
    exit();
  }
   
}
elseif(isset($_GET['Nvbverify']))
{
    if(isset($_SESSION['id']))
  {
     $bid = $_GET['Nvbverify'];
    $sql = "update blog set is_verified = '1' where bid = '$bid'";
    $res = mysqli_query($conn,$sql);
    require 'nvb.php';
  }
  else
  {
      header("Location:login.php");
    exit();
  }
   
}
elseif(isset($_GET['Nvbdelete']))
{
    if(isset($_SESSION['id']))
  {
    $bid = $_GET['Nvbdelete'];
    $sql = "update blog set is_deleted = '1' where bid = '$bid'";
    $res = mysqli_query($conn,$sql);
    require 'nvb.php';
  }
  else
  {
      header("Location:login.php");
    exit();
  }
    
}
elseif(isset($_GET['Vbsuspend']))
{
    if(isset($_SESSION['id']))
  {
    $bid = $_GET['Vbsuspend'];
    $sql = "update blog set is_verified = '0' where bid = '$bid'";
    $res = mysqli_query($conn,$sql);
    require 'vb.php';
  }
  else
  {
      header("Location:login.php");
    exit();
  }
    
}
elseif(isset($_GET['Vbdelete']))
{
    if(isset($_SESSION['id']))
  {
        $bid = $_GET['Vbdelete'];
    $sql = "update blog set is_deleted = '1' where bid = '$bid'";
    $res = mysqli_query($conn,$sql);
    require 'vb.php';
  }
  else
  {
      header("Location:login.php");
    exit();
  }
   
}
elseif(isset($_GET['bedit']))
{   
    if(isset($_SESSION['id']))
  {
      $_SESSION['bid'] = $_GET['bedit'];
    require 'edit_blog.php'; 
  }
  else
  {
      header("Location:login.php");
    exit();
  }
      
}
elseif(isset($_POST['edit_post']))
{
    if(isset($_SESSION['id']))
  {
    $bid = $_SESSION['bid'];
    $h = $_POST['bh'];
    $c = $_POST['bc'];
    $d = $_POST['bd']; 
    $path= $_FILES['bp']['name'];
    $t="img/".basename($path);
    $ext=strtolower(pathinfo($t,PATHINFO_EXTENSION));
    $sql = "update blog set bc='$c', bd='$d', bh='$h' where bid = '$bid'";
    $res = mysqli_query($conn,$sql);

    if($ext == "jpeg" || $ext == "jpg" || $ext == "png")
    {
    $sql = "update blog set bi='$t' where bid = '$bid'";
    $res = mysqli_query($conn,$sql);
    move_uploaded_file($_FILES['bp']['tmp_name'],$t);
    
    }
    $msg = "Blog updated";
    require 'edit_blog.php';
  }
  else
  {
    header("Location:login.php");
    exit();
  }
    
    
}
elseif(isset($_GET['read']))
{
    $bid = $_GET['read'];
    $sql = "select * from blog where bid = '$bid'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
    require 'readblog.php';
}
elseif(isset($_GET['analysis']))
{
  if(isset($_SESSION['id']))
  {
    
    $sql = "SELECT u.uid, u.name as name, COUNT(b.bid) AS total_blogs
            FROM userdetail AS u
            LEFT JOIN blog AS b ON b.uid = u.uid
            WHERE u.role = 'user'
            GROUP BY u.uid, u.name
            ORDER BY u.uid";
    $res = mysqli_query($conn, $sql);
    // foreach($r as $row)
    // {
    //   print_r($row);
    // }
    // exit();
    require 'chart.php';
    

  }
  else
  {
    header("Location:login.php");
    exit();
  }

}

// Edit Ajax Users
elseif (isset($_POST['type']) && $_POST['type'] == 'editshow') 
{
  if(isset($_SESSION['id']))
  {
    $uid = $_POST['uid'];
    $sql = "SELECT * FROM userdetail WHERE uid = '$uid'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    echo json_encode($row);
    }
  else
  {
    header("Location:login.php");
    exit();
  }

}

elseif(isset($_POST['edit_admin']))
{
    
 if(isset($_SESSION['id']))
  {
      $uid = $_POST['uid'];
      $n = $_POST['n'];
      $e = $_POST['e'];
      $m = $_POST['m'];

    if(!empty($n) &&!empty($e) && !empty($m))
      {
        $sql = "select * from userdetail where (uid!='$uid') && (email='$e' or mobile='$m')";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($res);
        if($row > 0)
        {
          $msg = "User Email or Mobile already exists";
          require 'vu.php';
        }
        else
        {
          $sql = "update userdetail set name='$n', email = '$e', mobile = '$m' where uid = '$uid'";
          $res = mysqli_query($conn, $sql);
          $msg = "User detail Updated";
          require 'vu.php';
        }
      }
      else
      {
        $msg = "Fill all credentials !!";
        require 'vu.php';
      }
  } 
  else
  {
    header("Location:http://localhost/crud_a/login.php");
    exit();
  } 
}

?>
