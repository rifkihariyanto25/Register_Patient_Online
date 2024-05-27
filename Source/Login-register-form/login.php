<?php
session_start();
include "koneksi.php";


// login
if (isset($_POST["login"])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE email = '$email'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            header("Location: informasi.html");
            exit;
        } else {
            echo "<script>alert('Password salah');</script>"; // Tambahkan alert jika password salah
        }
    } else {
        echo "<script>alert('Email tidak ditemukan');</script>"; // Tambahkan alert jika email tidak ditemukan
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSU Bunda Login</title>
    <link rel="stylesheet" href="css/loginn.css">
    <script src="js/login.js" defer></script>
</head>

<body>

    <div class="background-image">
        <div class="header">
            <h1>RSU <span class="highlight">Bunda</span></h1>
        </div>
        <div class="login-container">
            <div class="login-box">
                <form id="login-form" method="POST" action="">
                    <h2>Login Here</h2>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <button type="submit" name="login">Login</button>
                    <p>Belum Punya Akun? <a href="register.php">Register</a></p>
                    <?php if (isset($error)) : ?>
                        <p style="color: red;">Password atau email salah</p>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>