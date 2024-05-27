<?php
// koneksi ke database wajib diawal
$conn = mysqli_connect("localhost", "root", "", "dbbunda");

// menampilkan data di tabel
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


// registrasi
function registrasi($data)
{
    global $conn;

    $fullname = mysqli_real_escape_string($conn, $data["fullname"]); // Sanitasi input fullname
    $email = mysqli_real_escape_string($conn, $data["email"]); // Sanitasi input email
    $telepon = mysqli_real_escape_string($conn, $data["telepon"]); // Sanitasi input telepon
    $password = mysqli_real_escape_string($conn, $data["password"]); // Sanitasi input password


    // konfirmasi password
    $confirmPassword = mysqli_real_escape_string($conn, $data["confirmPassword"]);
    $password = $data["password"];
    $confirmPassword = $data["confirmPassword"];
    if ($password !== $confirmPassword) {
        echo "<script>
        alert('konfirmasi password tidak sesuai')
            </script>";
        return false;
    }

    // cek duplikat email dan telepon yang
    $result = mysqli_query($conn, "SELECT email FROM tbl_user WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Email sudah digunakan')
            </script>";
        return false;
    }


    // ENKRIPSI password
    $password = password_hash($password, PASSWORD_DEFAULT);
    // var_dump($password);
    // die;


    mysqli_query($conn, "INSERT INTO tbl_user VALUES ('', '$fullname', '$email', '$telepon','$password')");
    return mysqli_affected_rows($conn);
}
