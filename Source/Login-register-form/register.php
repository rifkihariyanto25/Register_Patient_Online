<?php
session_start();
include 'koneksi.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('user baru telah ditambahkan')
            </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSU Bunda - Registrasi</title>
    <link rel="stylesheet" href="css/register.css">
    <script src="js/register.js" defer></script>
</head>

<body>



    <div class="container">
        <div class="background"></div>
        <div class="form-container">
            <div class="logo">
                <h1>RSU <span>Bunda</span></h1>
            </div>
            <form id="register-form" method="post" action="">
                <h2>Isikan data diri anda dengan lengkap!!!</h2>
                <hr>
                <input type="text" id="fullname" name="fullname" placeholder="Masukan Nama" required>
                <input type="email" id="email" name="email" placeholder="Masukan Email" required>
                <input type="text" id="telepon" name="telepon" placeholder="Masukan Nomer Telepon" required>
                <input type="password" id="password" name="password" placeholder="Masukan Password" required>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Konfirmasi Password" required>
                <button type="submit" name="register">Register</button>
            </form>
        </div>
    </div>
</body>

</html>