<?php
    include_once('dbFunction.php');
    $funObj=new dbFunction();
    if(isset($_POST['login'])){
        $emailid=$_POST['emailid'];
        $password=$_POST['password'];
        $user=$funObj->Login($emailid,$password);
        if($user){
            header("location:profile.php");
        } else {
            echo "<script>alert('Emailid / Password Not Match')</script>";
        }
    }
    if(isset($_POST['register'])){
        $username=$_POST['username'];
        $emailid=$_POST['emailid'];
        $password=$_POST['Password'];
        $confirmPassword=$_POST['confirm_password'];
        if($password==$confirmPassword){
            $email=$funObj->isUserExits($emailid);
            if($email){
                $register=$funObj->UesrRegister($username,$emailid,$password);
                if($register){
                    echo "<script>alert('Registration Successful')</script>";
                }else{
                    echo "<script>alert('Registration not successful')</script>";
                }
            } else {
                echo "<script>('Email Already Exist')</script>";
            }
        } else {
            echo "<script>alert('Password Not Match')";
        }
    }
?>

<!doctype html>
<html>
    <head>
        <title>login page</title>
    </head>
    <body style="background-color:lightcoral;font-family:sans-serif;">

        <h1 style="text-align:center;">Login Form</h1>

        <form name="login" method="post" actions="">

        <p style="text-align:center; font-size:20px; font-weight:bold;"><br>
            <label>Email-id&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</label>
            <input style="padding:10px 20px" type="email" name="emailid" placeholder="enter the Email-id">
        </p>

        <p style="text-align:center; font-size:20px; font-weight:bold;"><br>
            <label>Password&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</label>
            <input style="padding:10px 20px" type="password" name="password" placeholder="enter the Password">
        </p>
        <br>

        <p style="text-align: center;">
            <input style="padding: 10px 20px; cursor:pointer;  border:0; background-color:rgb(68, 10, 10); color:white;" type="submit" name="login" value="Login">   
       </p>

       <p style="text-align: center;">
        No account?
        <a href="register.html">Create account</a>
    </p>
</form>
    </body>
</html>
