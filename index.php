<!doctype html>
<html lang="en">
<head>
	<title>Web Siasis Mobile</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-02.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="">
					<span class="login100-form-title">
						Login User
					</span>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="nip" placeholder="NIP">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
                    
                    <div class="wrap-input100 validate-input" >
						
                        <select name="level" class="form-control input100"> 
                        <option value="administrator">Administrator</option>
                        <option value="guru">Guru</option>
                        </select>

						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-book" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
                                            <button class="login100-form-btn" type="submit" name="submit">
							Login
						</button>
					</div>
					
				</form>
<?php
if (isset($_POST['submit'])) {
	include 'koneksi.php';
	$pass=md5($_POST['password']);

    if($_POST['level']=="administrator"){
        $cek=mysqli_query($koneksi,"SELECT * FROM administrator WHERE 
        nip_ad='$_POST[nip]' AND password='$pass'");

        $data=mysqli_fetch_array($cek);
        $result=mysqli_num_rows($cek);
        if ($result==1) {
            session_start();
            $_SESSION['id_adm']=$data['id_adm'];
            // $_SESSION['level']=$data['level'];
            // $_SESSION['iduser']=$data['id'];
            
            echo "<script>top.location='admin/index.php?page=home&id_adm=$data[id_adm]'</script>";
                }
        else {
            echo "<script>alert('Username and password invalid')</script>";
        }
		

    }else {
        $cek=mysqli_query($koneksi,"SELECT * FROM guru WHERE 
        nip_guru='$_POST[nip]' AND password='$pass'");

        $data=mysqli_fetch_array($cek);
        $result=mysqli_num_rows($cek);
        if ($result==1) {
            session_start();
            $_SESSION['id_guru']=$data['id_guru'];
            // $_SESSION['level']=$data['level'];
            // $_SESSION['iduser']=$data['id'];
            
            echo "<script>top.location='guru/index.php?page=home&id_guru=$data[id_guru]'</script>";
                }
        else {
            echo "<script>alert('Username and password invalid')</script>";
        }

    }
	
}
?>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
