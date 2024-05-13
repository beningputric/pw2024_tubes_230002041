<?php
session_start();

// Cek apakah pengguna sudah login atau belum
if(isset($_SESSION['username'])){
    header("Location: dashboard.php");
    exit();
}

// Cek apakah form login sudah di-submit
if(isset($_POST['login'])){
    // Ambil data dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi username dan password
    if($username == "admin" && $password == "admin123"){
        // Jika valid, simpan username ke session
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    }else{
        // Jika tidak valid, tampilkan pesan error
        $error = "Username atau password salah";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if(isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>