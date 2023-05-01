<?php
include 'koneksi.php';

function register($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$cpassword = mysqli_real_escape_string($conn, $data["cpassword"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $cpassword ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO admin VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);

}

if(isset($_POST['register'])) {
    if(register($_POST) > 0){
        echo "<script>alert('user baru berhasil ditambahkan')</script>";
    } else {
        echo mysqli_error($conn);
    }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="mb-3">
                <label for="username">Username</label> 
                <input type="text" placeholder="Username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="username">Password</label> 
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="username">Confirm Password</label> 
                <input type="password" placeholder="Confirm Password" name="cpassword" required>
            </div>
            <div class="col-12">
                <button type="submit" name="register" class="btn btn-success">Register</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="index.php">Login </a></p>
        </form>
    </div>
</body>
</html>