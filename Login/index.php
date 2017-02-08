<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="js.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pr-wrap">
                <div class="pass-reset">
                   <fieldset>
                    <label>
                        Enter the email you signed up with</label>
                    <input type="email" placeholder="Email" />
                    <input type="submit" value="Submit" class="pass-reset-submit btn btn-success btn-sm" />
                </div>
            </div>
            <div class="wrap">
                <p class="form-title">
                    Sign In</p>
                <form class="login" action="#" method="post">
                <input type="text" name="username" placeholder="Username" />
                <input type="password" name="password" placeholder="Password" />
                <input type="submit" name="submit" value="Sign In" class="btn btn-success btn-sm" />
                <div class="remember-forgot">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" />
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 forgot-pass-content">
                            <a href="javascript:void(0)" class="forgot-pass">Forgot Password</a>
                        </div>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
   <?php 
   if (isset($POST['submit'])){
    $conn = oci_connect('hr','hr', "//localhost/XE");
        $username = $_POST['username'];
        $password = $_POST['password'];
    do_query($conn, "SELECT EMPLOYEE_ID FROM EMPLOYEES WHERE EMPLOYEE_ID='".$username."' and email = '".$password."'");
    
   } 
   function do_query($conn, $query){
    $stid = oci_parse($conn, $query);
    $r = oci_execute($stid, OCI_DEFAULT);
    $row = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS);
    $item = oci_num_rows($stid);
    echo $item;
if($item = 1){
   echo "error";
}
else{
    header("location: list.php");
}
}
?>

</body>
</html>