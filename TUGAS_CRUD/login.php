<?php 
session_start();
include 'koneksi.php';

//cek cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	//mengambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM admin WHERE id='$id'");
	$row = mysqli_fetch_assoc($result);

	//cek cookie dan username
	if($key === hash('sha256', $row['username'])) {
		$_SESSION['login'] = true;
	}
}

if(isset($_SESSION["login"])) {
	header("Location: index.php");
    exit;
}

if(isset($_POST['login'])) {
	global $conn;

	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");

	//cek username
	if(mysqli_num_rows($result) === 1) {
		//cek password
		$row = mysqli_fetch_assoc($result);
		if(password_verify($password, $row["password"]) ) {
			//set session
			$_SESSION["login"] = true;
			//cek remember me
			if(isset($_POST['remember'])) {
				//buat cookie
				setcookie('id', $row['id'], time() + 60);
				setcookie('key', hash('sha256', $row['username']), time()+60);
			}

			header("Location: index.php");
			exit;
		}
	} 
	echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
	$error = true;
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Membuat Login Dengan PHP dan MySQL</title>
	<link rel="stylesheet" href="style.css">	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
	<div class="content">
		<div class="card-login">
			<div class="card-main">
				<div class="card-header">Halaman Login</div>
				<?php if( isset($error) ) : ?>
					<p style="color: red; font-style: italic;">Username atau password Anda salah</p>
				<?php endif; ?>
				<div class="card-body">
					<form class="form-login" method="POST" action="">
					<div class="input-group" style="margin-bottom: 25px">
                        <input id="login-username" type="text" class="form-control" name="username" placeholder="username">                                        
                    </div>
                    <div class="input-group" style="margin-bottom: 25px">
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                    </div>
					<div>
						<input type="checkbox" name="remember" id="remember">
						<label for="remember">Remember Me</label>
					</div>
                    <div class="input-group" style="margin-top:10px">
                        <button type="submit" name="login" class="btn btn-success">Login</button>
					</div>
					<p class="login-register-text">Belum punya akun?<span><a href="register.php">Daftar disini</a></span></p>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>