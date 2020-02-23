<?php
session_start();
if (!isset($_SESSION['admin'])){
  
        header('Location: login.php');
   

}
    $erroneo=0;
    if(isset($_POST['pass1']) && isset($_POST['pass2'])){
    if ($_POST['pass1']==$_POST['pass2']){
        include 'conexiondb.php';
        $sql = "SELECT pass FROM admin";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
    // output data of each row
            while($row = $result->fetch_assoc()) {
            //$row["id"]
                if ($row["pass"]==md5($_POST['oldpass'])){
                    $oldpass=md5($_POST['oldpass']);
                    $newpass=md5($_POST['pass2']);
                    echo "contraseña correcta";
                    //session_start();
                    $sql2 = "UPDATE admin SET pass='$newpass' WHERE pass='$oldpass'";
                    
                    if (mysqli_query($conn, $sql2)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                    }
                    echo " actualizado con exito";                 
                    
                }
                else {
                    $erroneo=1;
                }
            }
        }
          else {
            echo "No existe nada en la base de datos";
        }
        //echo "\n".$_POST['usuario'].md5($_POST['password']);
    }
    else {
    $erroneo=1;
    }
    }
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Bootstrap 4 Login Form</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
</head>

<body>
        <div class="container">
        <form class="form-horizontal" role="form" method="POST" action="changepass.php">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Please Login</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                         <label class="sr-only" for="password">Password</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                            <input type="password" name="oldpass" class="form-control" id="password"
                                   placeholder="Antigua Contraseña" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <?php if($erroneo==1){?><i class="fa fa-close"></i><?php echo "Datos erroneos";}?> 
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="password">Password</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                            <input type="password" name="pass1" class="form-control" id="password"
                                   placeholder="Nueva contraseña" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                        <!-- Put password error message here -->    
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="password">Password</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                            <input type="password" name="pass2" class="form-control" id="password"
                                   placeholder="Repita contraseña" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                        <!-- Put password error message here -->    
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6" style="padding-top: .35rem">
                    <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                        <label class="form-check-label">
                            <input class="form-check-input" name="remember"
                                   type="checkbox" >
                            <span style="padding-bottom: .15rem">Remember me</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 1rem">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success"><i class="fa fa-sign-in"></i> Login</button>
                    <a class="btn btn-link" href="/password/reset">Forgot Your Password?</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>